<?php

function emailButton($actionText, $actionUrl, $actionColor = 'blue', $size = 'normal')
{
    $style  = config()->get('mail.styles');
    $button = '<table style="' . $style['body_action'] . '" align="center" width="100%" cellpadding="0" cellspacing="0">';
    $button .= '<tr>';
    $button .= '<td align="center">';

    $button .= '<a href="' . $actionUrl . '" style="' . $style['font-family'] . ' ' . $style['button'] . ' ' . $style['button--' . $actionColor] . ' ' . $style['button--' . $size] . '" class="button" target="_blank">';
    $button .= $actionText;
    $button .= '</a>';

    $button .= '</td>';
    $button .= '</tr>';
    $button .= '</table>';

    return $button;
}
