<section class="module">
          <div class="container">
          <h2 class="font-alt module-title"><?php echo $title?></h2>
            <div class="row multi-columns-row post-columns">
                <?php
                    displaySponsors(getSponsorLevel('Terrabit'));
                    displaySponsors(getSponsorLevel('Gigabit'));
                    displaySponsors(getSponsorLevel('Megabit'));
                    

                    ?>


            </div>
            <div class="row">
                <?php
                  

                    
                    print wpautop($content);

                    ?>


            </div>
    </div>
</section>
