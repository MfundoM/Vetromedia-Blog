<?php
function blurb($text, $limit = 26, $ellipsis = '...', $paragraphs = false)
{
    if ($paragraphs) {
        $text = str_replace("</p>", "</p>{}{}", $text);
    }
    $words = preg_split("/[\n\r\t ]+/", strip_tags($text), $limit + 1, PREG_SPLIT_NO_EMPTY);
    if (count($words) > $limit) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $ellipsis;
    }
    if ($paragraphs) {
        $text = str_replace("{}{}", "<br /><br />", $text);
    }
    return $text;
}
