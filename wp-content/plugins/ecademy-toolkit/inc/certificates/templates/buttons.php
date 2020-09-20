<?php
/**
 * Template for displaying download button.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/addons/certificates/buttons.php.
 *
 * @author  ThimPress
 * @package LearnPress/Templates/Certificates
 * @cersion 3.0.0
 */

defined( 'ABSPATH' ) or die();

if ( ! isset( $certificate ) ) {
	return;
}
?>

<ul class="certificate-actions">
    <li class="download">
   <?php 
   $cert_image = ( 'image' == LP()->settings->get( 'certificates.cer_type' ));
   if($cert_image) {
	   $cert_file_path = $certificate->get_file_path();
	   $cert_image_url = $cert_file_path['img_url'];
   ?>
        <a href="<?php echo esc_url( $cert_image_url ); ?>" download="<?php echo esc_attr( pathinfo( $cert_image_url, PATHINFO_BASENAME ) ); ?>"></a>
   <?php 	
   } else {

   ?>
        <div style="display:none" id="5545"></div>
        <a class="download_certificate_btn" href="" data-cert="<?php echo $certificate->get_uni_id(); ?>" data-type="jpg"><?php echo esc_html_e( 'Download Certificate', 'ecademy-toolkit' ); ?></a>
        <button class="lp_print_cer_btn"> <?php echo esc_html_e( 'Print Certificate', 'ecademy-toolkit' ); ?></button>

        <script type="text/javascript">
            (function($){
                "use strict";
                    $(".lp_print_cer_btn").click(function(){

                        var cookieValue = document.getElementById('5545'); var textContent = cookieValue.textContent;

                        function VoucherSourcetoPrint() {
                            
                            return "<html><head><script>function step1(){\n" +
                                    "setTimeout('step2()', 10);}\n" +
                                    "function step2(){window.print();window.close()}\n" +
                                    "</scri" + "pt></head><body onload='step1()'>\n" +
                                    "<img src='" + textContent + "' /></body></html>";
                        }
                        var pwa = window.open();
                        pwa.document.open();
                        pwa.document.write(VoucherSourcetoPrint(textContent));
                        pwa.document.close();
                    });
            }(jQuery));
        </script>
        <style>
        .certificate-actions li.download a, .lp_print_cer_btn {
            padding: 10px 25px !important;
            display: inline-block;
            background: #2e8a17 !important;
            height: auto !important;
            border: none;
            line-height: 24px;
            color: #fff !important;
            font-weight: normal;
            border: 1px solid #fff;
            margin-right: 2px;
            cursor: pointer;
            transition: 0.4s;
            border-radius: 6px;
            font-size: 16px !important;
            font-family: normal !important;
        }
        .certificate-actions li.download a:hover, .lp_print_cer_btn:hover {
            background: #000 !important;
        }
        .certificate-actions li.download a:after {
            content: "\f019";
            font-family: fontawesome;
            margin-left: 8px;
        }
        .lp_print_cer_btn:after {
            content: "\f02f";
            font-family: fontawesome;
            margin-left: 8px;
        }
        </style>
   <?php 
   }
   
   ?>
    </li>
	<?php if ( $socials ) {
		foreach ( $socials as $social ) { ?>
            <li>
				<?php echo $social; ?>
            </li>
		<?php }
	} ?>
</ul>

