<?php

namespace App;

enum TalkType: string
{
    case LIGHTNING = 'lightning';
    case STANDARD = 'standard';
    case KEYNOTE = 'keynote';
}
