<?php

/*
Snaps Name: NTT
Description: Based on Applicator
Version: 0.0.0
*/

function cm_datetime_year_mod() {
    return 'M';
}
add_filter( 'cm_datetime_year', 'cm_datetime_year_mod' );