<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eveal
 */

get_header();
 
?>
	<main id="primary" class="site-main">

    <div class="filterPan">

        <div class="filterTabs dflex">
            <ul class="hasTax" data-term="locality"><li class="locality">Locality</li></ul>
            <ul class="hasTax" data-term="industry"><li class="industry">Industry</li></ul>
        </div>    
        <div class="dflex card-container data-filter" id="card-container"></div><div class="pageNav dflex"></div>
    </div>

    <script>

    // Function to fetch terms from REST API
    async function getTaxonomies(taxContainer, termSlug) {
        try {
            // Fetch terms from the API
            const termResponse = await fetch(`http://localhost/eveal/wp-json/wp/v2/${termSlug}`);
            if (!termResponse.ok) throw new Error('Network response was not ok');

            const terms = await termResponse.json();
            const termContainer = taxContainer;

            terms.forEach(term => {
                const button = document.createElement('li');
                button.innerText = term.name;
                button.setAttribute("role", "button");
                button.setAttribute("data-termID", term.id);
                button.setAttribute("data-term", term.slug);
                button.classList.add('button');
                termContainer.append(button);
            });

        } catch (error) {
            console.error('There was a problem with the fetch operation:', error);
        }
    }

    function addTaxonomies() {
        
        jQuery(function($){
            
            $('.hasTax').each(function(){
                getTaxonomies($(this),$(this).data('term'));
            });
        });
    } 
    
    addTaxonomies();

    // Function to render projects in card format

    async function renderFeaturedMedia(mediaID) { 
        const featuredMediaUrl = `http://localhost/eveal/wp-json/wp/v2/media/${mediaID}?_fields=source_url,media_details`;
        let cardMedia = document.createElement('img');
        try {
            const mediaResponse = await fetch(featuredMediaUrl);
            if (!mediaResponse.ok) throw new Error('Network response was not ok');
            const media = await mediaResponse.json();
            cardMedia.src = media.source_url;
            cardMedia.setAttribute('height',  media.media_details.height);
            cardMedia.setAttribute('width',  media.media_details.width);
            cardMedia.setAttribute('loading',  'lazy');
            console.log(cardMedia);
            return cardMedia;
        } catch (error) {
            return "";
        }
    }
 
async function renderProjects(projects) {
    const cardContainer = document.getElementById('card-container');
    cardContainer.innerHTML = '';

    for (const project of projects) {
        const card = document.createElement('article');
        card.classList.add('card');

        const title = project.title?.rendered || 'Untitled Project';
        const cardTitle = document.createElement('div');
        cardTitle.classList.add('card-title');
        cardTitle.innerText = title;

        const cardLink = document.createElement('a');
        cardLink.href = project.url;
        cardLink.innerText = 'View Project';
        cardLink.classList.add('card-link');

        let mediaHtml = document.createElement('div');
        mediaHtml.classList.add('imgWrap');
        const mediaId = project.featured_media;
        if(mediaId) {
            var mediaHtmlEl = await renderFeaturedMedia(mediaId);
            mediaHtml.append(mediaHtmlEl);
        }
                       
        const industries = project.class_list
            .filter(cls => cls.startsWith('industry-'))
            .map(cls => cls.replace('industry-', '').replace(/-/g, ' '))
            .join(', ');

        const status = project.class_list
            .filter(cls => cls.startsWith('status-'))
            .map(cls => cls.replace('status-', '').replace(/-/g, ' '))
            .join(', ');

        const cardIndustries = document.createElement('div');
        cardIndustries.classList.add('card-industries');
        cardIndustries.innerText = `Industries: ${industries}`;
        const cardStatus = document.createElement('span');
        cardStatus.classList.add('card-status');
        cardStatus.innerText = status;
        card.append(mediaHtml,cardIndustries, cardStatus, cardTitle, cardLink);
        cardContainer.appendChild(card);
        
        setTimeout(() => {
            card.classList.add('in');
        }, 100);

    }

    cardContainer.children.length >= 1 ? '' : jQuery('.card-container').append("<p class='wid100 ribbon'>No Projects Available!</p>");
    jQuery('.filterPan').removeClass('loading');
}

    // Fetch projects from REST API
    const postsPerPage = 100;
    async function fetchProjects(termQuery) {
        
        var start = new Date().getTime();
        const pageNumber = 1;
        const fieldParams = '&_fields=id,title,url,class_list,acf';
        const termQueryParams = termQuery ? termQuery : '';
        const reqUrl = `http://localhost/eveal/wp-json/wp/v2/projects?per_page=${postsPerPage}&order=asc&page=${pageNumber}${termQueryParams}${fieldParams}`;
       // console.log(reqUrl);

        try {
            const response = await fetch(reqUrl);
            if (!response.ok) throw new Error('Network response was not ok');
            const projects = await response.json();
            console.log(projects);
            renderProjects(projects);
            const totalPages = response.headers.get('X-WP-TotalPages');
            updatePagination(termQueryParams, totalPages);
        } catch (error) {
            console.error('There was a problem with the fetch operation:', error);
        }


        var end = new Date().getTime();
        var time = end - start;
        alert('Execution time: ' + time);

    }

    // Update pagination links
    function updatePagination(termQueryParams, totalPages) {
        const pageNav = jQuery('.pageNav');
        pageNav.empty();       
        const termQuery = termQueryParams ? termQueryParams : '';
        for (let x = 1; x <= totalPages; x++) {
            const pageLink = `<a class="pageNumber ${ x == 1 ? 'isActive' : ''}" href="http://localhost/eveal/wp-json/wp/v2/projects?per_page=${postsPerPage}&order=asc${termQuery}&page=${x}">${x}</a>`;
            pageNav.append(pageLink);
        } 
        
    }

    // Fetch paginated data
    async function fetchNavPageData(offsetURL) {
        try {
            const response = await fetch(offsetURL);
            if (!response.ok) throw new Error('Network response was not ok');
            const projects = await response.json();
            renderProjects(projects);
        } catch (error) {
            console.error('There was a problem with the fetch operation:', error);
        }
    }

    // Event listeners using jQuery
    fetchProjects();
    jQuery(function ($) {
        // Pagination Navigation
        $('body').on('click', '.pageNav a', function (e) {
            e.preventDefault();
            fetchNavPageData($(this).attr('href'));
            console.log($(this).attr('href'));
            $(this).addClass('isActive').siblings('a').removeClass('isActive');
            $('.filterPan').addClass('loading');
        });

        // Filter projects by terms
        $('body').on('click', '.filterTabs .button', function () {
            $(this).toggleClass('active');
            fetchFilteredProjects();
        });

        $('body').on('click', '.filterTabs ul', function () {
            $(this).toggleClass('isOpen');
        });

        // Fetch projects based on filters
        function fetchFilteredProjects() {

            // termIDS ? `&industry=${termIDS}` : '';

            // let filterTermQuery = $('.filterTabs .button.active').map(function () {
            //     return $(this).attr('data-termid');
            // }).get().join(',');

            let filterTermQuery = ''; 
            
            $('.filterTabs ul').each(function( ){

                if( $(this).children('.button.active').length >= 1) { 
                    let termType= $(this).data('term');
                    let termIds = $(this).find('.button.active').map(function () {
                        return $(this).attr('data-termid');
                    }).get().join(',');

                    filterTermQuery = `${filterTermQuery}&${termType}=${termIds}`;

                } 
                console.log("filterTermQuery"+filterTermQuery);

            });

            $('.filterPan').addClass('loading');
            fetchProjects(filterTermQuery);
        }

    });
        
    </script>
	</main><!-- #main -->

<?php
 
get_footer();
