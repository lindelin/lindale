<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

class ColorableRepository
{
    /**
     * @return mixed
     */
    public static function panel()
    {
        return Collection::make([
            'panel-primary',
            'panel-success',
            'panel-info',
            'panel-warning',
            'panel-danger',
            'panel-default',
        ])->random();
    }

    /**
     * @return mixed
     */
    public static function lindale()
    {
        return Collection::make([
            'background-color: #d8282e;color: #FFFFFF;',
            'background-color: #c7171e;color: #FFFFFF;',
            'background-color: #de5c63;color: #FFFFFF;',
            'background-color: #f8b551;color: #FFFFFF;',
            'background-color: #ed6942;color: #FFFFFF;',
            'background-color: #f2914a;color: #FFFFFF;',
            'background-color: #ffce00;color: #FFFFFF;',
            'background-color: #fff45c;color: #000000;',
            'background-color: #7fb236;color: #FFFFFF;',
            'background-color: #58b8b6;color: #FFFFFF;',
            'background-color: #0069ae;color: #FFFFFF;',
            'background-color: #2799c8;color: #FFFFFF;',
            'background-color: #eb68a3;color: #FFFFFF;',
            'background-color: #ff6ead;color: #FFFFFF;',
            'background-color: #000000;color: #FFFFFF;',
        ])->random();
    }

    /**
     * @return mixed
     */
    public static function listGroup()
    {
        return Collection::make([
            'list-group-item-success',
            'list-group-item-info',
            'list-group-item-warning',
        ])->random();
    }

    public static function lindaleImage()
    {
        return Collection::make([
            'img/profile/a.jpg',
            'img/profile/b.jpg',
            'img/profile/c.jpg',
            'img/profile/d.jpg',
            'img/profile/e.jpg',
            'img/profile/f.jpg',
            'img/profile/g.jpg',
            'img/profile/h.jpg',
            'img/profile/i.jpg',
            'img/profile/j.jpg',
            'img/profile/k.jpg',
            'img/profile/l.jpg',
            'img/profile/m.jpg',
            'img/profile/n.jpg',
            'img/profile/o.jpg',
            'img/profile/p.jpg',
            'img/profile/q.jpg',
            'img/profile/r.jpg',
            'img/profile/s.jpg',
            'img/profile/t.jpg',
            'img/profile/u.jpg',
            'img/profile/v.jpg',
            'img/profile/w.jpg',
            'img/profile/x.jpg',
            'img/profile/y.jpg',
            'img/profile/z.jpg',
        ])->random();
    }

    public static function lindaleProfileImg($email)
    {
        switch ($email[0]) {
            case 'a':
                return 'img/profile/a.jpg';
                break;
            case 'b':
                return 'img/profile/b.jpg';
                break;
            case 'c':
                return 'img/profile/c.jpg';
                break;
            case 'd':
                return 'img/profile/d.jpg';
                break;
            case 'e':
                return 'img/profile/e.jpg';
                break;
            case 'f':
                return 'img/profile/f.jpg';
                break;
            case 'g':
                return 'img/profile/g.jpg';
                break;
            case 'h':
                return 'img/profile/h.jpg';
                break;
            case 'i':
                return 'img/profile/i.jpg';
                break;
            case 'j':
                return 'img/profile/j.jpg';
                break;
            case 'k':
                return 'img/profile/k.jpg';
                break;
            case 'l':
                return 'img/profile/l.jpg';
                break;
            case 'm':
                return 'img/profile/m.jpg';
                break;
            case 'n':
                return 'img/profile/n.jpg';
                break;
            case 'o':
                return 'img/profile/o.jpg';
                break;
            case 'p':
                return 'img/profile/p.jpg';
                break;
            case 'q':
                return 'img/profile/q.jpg';
                break;
            case 'r':
                return 'img/profile/r.jpg';
                break;
            case 's':
                return 'img/profile/s.jpg';
                break;
            case 't':
                return 'img/profile/t.jpg';
                break;
            case 'u':
                return 'img/profile/u.jpg';
                break;
            case 'v':
                return 'img/profile/v.jpg';
                break;
            case 'w':
                return 'img/profile/w.jpg';
                break;
            case 'x':
                return 'img/profile/x.jpg';
                break;
            case 'y':
                return 'img/profile/y.jpg';
                break;
            case 'z':
                return 'img/profile/z.jpg';
                break;
            default:
                return self::lindaleImage();
        }
    }
}
