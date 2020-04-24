<?php
// Fonctions diverses pour ne garder q'une partie d'une chaine de charactères
function after($symbole, $phrase)
{
    if (!is_bool(strpos($phrase, $symbole))) {
        return substr($phrase, strpos($phrase, $symbole)+strlen($symbole));
    }
};

function after_last($symbole, $phrase)
{
    if (!is_bool(strrevpos($phrase, $symbole))) {
        return substr($phrase, strrevpos($phrase, $symbole)+strlen($symbole));
    }
};

function before($symbole, $phrase)
{
    return substr($phrase, 0, strpos($phrase, $symbole));
};

function before_last($symbole, $phrase)
{
    return substr($phrase, 0, strrevpos($phrase, $symbole));
};

function between($symbole, $symbole2, $phrase)
{
    return before($symbole2, after($symbole, $phrase));
};

function between_last($symbole, $symbole2, $phrase)
{
    return after_last($symbole, before_last($symbole2, $phrase));
};

// use strrevpos function in case your php version does not include it
function strrevpos($instr, $needle)
{
    $rev_pos = strpos(strrev($instr), strrev($needle));
    if ($rev_pos===false) {
        return false;
    } else {
        return strlen($instr) - $rev_pos - strlen($needle);
    }
};