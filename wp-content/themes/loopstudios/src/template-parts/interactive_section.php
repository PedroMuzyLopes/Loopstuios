 <section id="info">
   <div class="photo">
     <img src="<?php
                if (get_theme_mod('photo_interactive') != '') {
                  echo get_theme_mod('photo_interactive');
                } else {
                  echo get_template_directory_uri() . "/src/images/interactive.jpg";
                }
                ?>" alt="alternative text for this image">
   </div>
   <div class="content flex col">
     <h2><?php
          if (get_theme_mod('title_interactive') != '') {
            echo get_theme_mod('title_interactive');
          } else {
            echo ("Edit this title in theme settings");
          }
          ?></h2>
     <p><?php
        if (get_theme_mod('textarea_interactive') != '') {
          echo get_theme_mod('textarea_interactive');
        } else {
          echo ("Founded in 2011, Loopstudios has been producting world-class virtual reality projects for some of the best companies around the globe. Our award-winning creations have transformed businesses through digital experiences that bind to their brand.");
        }
        ?></p>
   </div>
 </section>