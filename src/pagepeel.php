<?php

function pagepeel_create()
{
    $options = get_option('pagepeel_settings');
    ?>

    <div id="page-peel-yellow">
        <div id="page-peel-red"></div>
        <div id="page-peel-corner"><a href="<?php echo $options['pagepeel_target_url']; ?>"
                                      target="<?php echo $options['pagepeel_link_target']; ?>">&nbsp;</a></div>
    </div>

    <style>
        #page-peel-yellow {
            position: absolute;
            width: 100px;
            height: 100px;
            background: url(<?php echo $options['pagepeel_small_image']; ?>) no-repeat scroll 0% 0%;
            border: 0px none transparent;
            -webkit-transition: 3s;
            /* For Safari 3.1 to 6.0 */
            transition: width 3s, height 3s;
            top: 0;
            left: 0;
            z-index: 99998;
        }

        #page-peel-yellow:hover {
            border: 0px none transparent;
            width: 400px;
            height: 400px;
        }

        #page-peel-yellow:hover #page-peel-red {
            opacity: 1;
            transition: opacity 0.1s;
        }

        #page-peel-red {
            position: absolute;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0), rgba(243, 243, 243, 0.3) 45%, rgba(221, 221, 221, 0.3) 50%, rgb(170, 170, 170) 50%, rgb(187, 187, 187) 56%, rgb(204, 204, 204) 62%, rgb(243, 243, 243) 80%, rgb(255, 255, 255) 100%) repeat scroll 0% 0%, transparent url(<?php echo $options['pagepeel_large_image']; ?>) repeat scroll 0% 0%;
            width: 100%;
            height: 100%;
            opacity: 0;
            border: 0px none transparent;
            transition: opacity 0.1s 2.9s;
        }

        #page-peel-corner {
            position: absolute;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0), rgba(243, 243, 243, 0.3) 45%, rgba(221, 221, 221, 0.3) 50%, rgb(170, 170, 170) 50%, rgb(187, 187, 187) 56%, rgb(204, 204, 204) 62%, rgb(243, 243, 243) 80%, rgb(255, 255, 255) 100%) repeat scroll 0% 0%, transparent no-repeat scroll 0% 0%;
            width: 100%;
            height: 100%;
        }

        #page-peel-corner a {
            display: block;
            height: 100%;
            width: 100%;
            text-decoration: none;
            background-color: transparent;
            border: none;
        }

        #page-peel-corner a:active {
            outline: none;
        }
    </style>
<?php }

add_action('wp_footer', 'pagepeel_create');