<?php
/*
Plugin Name: Cloud Retail Systems A/S - Sapera Energy labels
Plugin URI: http://cloudretailsystems.dk
Description: Show Energy labels and arrows and product sheet: [crs_energy_grade] [crs_energy_label]. CSS for changing background on catelog viewing: .energybox{	background:#ffffffa1 !important;}
Author: Cloud Retail Systems A/S - Søren Højby
Version: 1.0
Author URI: http://cloudretailsystems.dk
*/

// energy_lightning
function crs_energy_grade() {
    global $product;

    if(!is_null($product)){
        if($product->get_attribute('Energy_grade') OR $product->get_attribute('Energy_grade_old')){
            $direction = "Left"; // (either Right or Left) The directions of the arrow.

            if($direction !="Right"){
                $direction ="Left";
            }

            $energy_grade = @$product->get_attribute('Energy_grade');
            $energy_grade_old = @$product->get_attribute('Energy_grade_old');


            $energy_sheet = @$product->get_attribute('Energy_sheet');
            if($energy_grade_old != " " AND $energy_grade_old !=""){

                if($energy_grade != " " AND $energy_grade !=""){
                    return '<img src="/wp-content/plugins/crs_energylabels/public/img/'.$energy_grade.'_'.$direction.'.png"  alt="Energi label - Grade '.$energy_grade.'" style="max-height: 40px"><br><a href="'.$energy_sheet.'" class="textlink" target="_blank" rel="nofollow">'. __("Produktblad", "productsheet").'</a>';
                }else{
                    return '<img src="/wp-content/plugins/crs_energylabels/public/img/'.$energy_grade_old.'_old_'.$direction.'.png"  alt="Energi label - Grade '.$energy_grade_old.'" style="max-height: 40px"><br><a href="'.$energy_sheet.'" class="textlink" target="_blank" rel="nofollow">'. __("Produktblad", "productsheet").'</a>';
                }
            }else{
                return '<img src="/wp-content/plugins/crs_energylabels/public/img/'.$energy_grade.'_'.$direction.'.png"  alt="Energi label - Grade '.$energy_grade.'" style="max-height: 40px"><br><a href="'.$energy_sheet.'" class="textlink" target="_blank" rel="nofollow">'. __("Produktblad", "productsheet").'</a>';
            }

        }else{
            return  '<span class="woo-custom-intervals"></span>';
        }
    }

}


add_shortcode('crs_energy_grade', 'crs_energy_grade');


add_action( 'woocommerce_after_shop_loop_item', 'crs_energy_grade_for_catalog');
function crs_energy_grade_for_catalog() {
    global $product;
    if(!is_null($product)){
        if($product->get_attribute('Energy_grade') OR $product->get_attribute('Energy_grade_old')){
            $direction = "Left"; // (either Right or Left) The directions of the arrow.

            if($direction !="Right"){
                $direction ="Left";
            }

            $energy_grade = @$product->get_attribute('Energy_grade');
            $energy_grade_old = @$product->get_attribute('Energy_grade_old');


            $energy_sheet = @$product->get_attribute('Energy_sheet');
            if($energy_grade_old != " " AND $energy_grade_old !=""){

                if($energy_grade != " " AND $energy_grade !=""){
                    echo '<div class="energybox" style="display:flex; width:100%; justify-content:space-between;"><a style="width:50%;text-align: left;" href="'.$energy_sheet.'" target="_blank" rel="nofollow">Produktblad</a><img src="/wp-content/plugins/crs_energylabels/public/img/'.$energy_grade.'_'.$direction.'.png"  alt="Energi label - Grade '.$energy_grade.'" style="width:unset;max-height: 40px"></div>';
                }else{
                    echo '<div class="energybox" style="display:flex; width:100%; justify-content:space-between;"><a style="width:50%;text-align: left;" href="'.$energy_sheet.'" target="_blank" rel="nofollow">Produktblad</a><img src="/wp-content/plugins/crs_energylabels/public/img/'.$energy_grade_old.'_old_'.$direction.'.png"  alt="Energi label - Grade '.$energy_grade_old.'" style="width:unset;max-height: 40px"></div>';
                }
            }else{
                echo '<div class="energybox" style="display:flex; width:100%; justify-content:space-between;"><a style="width:50%;text-align: left;" href="'.$energy_sheet.'" target="_blank" rel="nofollow">Produktblad</a><img src="/wp-content/plugins/crs_energylabels/public/img/'.$energy_grade.'_'.$direction.'.png"  alt="Energi label - Grade '.$energy_grade.'" style="width:unset;max-height: 40px"></div>';
            }

        }else{
            echo  '<span class="woo-custom-intervals"></span>';
        }
    }

}




function crs_energy_label() {
    global $product;

    if(!is_null($product)){
        if($product->get_attribute('Energy_label')){

            $energy_label = @$product->get_attribute('Energy_label');
            $energy_grade = @$product->get_attribute('Energy_grade');
            $energy_productsheet = @$product->get_attribute('Energy_productsheet');
            return '<div><img src="'.$energy_label.'" alt="Energi label - Grade '.$energy_grade.'" style="width: 100%"></div>';
        }else{
            return  '';
        }
    }

}

add_shortcode('crs_energy_label', 'crs_energy_label');


