<?php
/*
Template Name: Collection Landing Page
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    wp_redirect(get_home_url() . "/collection-camp");
    exit;
}
?>
<div class="text-center">
    <h2 class="font-sans fw-600 mb-6 mobile-margin-left-30">Goonj Collection Camp</h2>
    <p class="font-sans fw-400 mt-0 mb-24 mobile-margin-left-30">Please go through the details below</p>
    <ol>
        <li class="font-sans mb-6 mobile-margins-l24-r30 fz-16">
            Before organising the collection drives, kindly go through our guidelines here - <a href="https://rb.gy/9nfbus" target="_blank">https://rb.gy/9nfbus</a>. Understanding all the guidelines beforehand is important to avoid any inconvenience later.
        </li>
        <li class="font-sans mb-6 mobile-margins-l24-r30 fz-16">
            Collection drives can be organised in the cities where Goonj has its offices after proper coordination with the relevant offices - Delhi, Rishikesh, Mumbai, Chennai, Bangalore, Hyderabad, Kochi and Kolkata.
        </li>
        <li class="font-sans mb-6 mobile-margins-l24-r30 fz-16">
            If you are in any other city besides the cities mentioned above, we would request you to facilitate the crucial aspect of reaching the collected material to the nearest Goonj office. For list of Goonj offices, please refer - <a href="https://goonj.org/our-offices/" target="_blank">https://goonj.org/our-offices/</a>
        </li>
    </ol>
    <form method="post">
        <p class="login-submit">
            <input type="submit" class="button button-primary w-100p mt-36" value="Continue">
        </p>
    </form>
</div>
