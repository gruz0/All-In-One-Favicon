<?php
/**
 * @package Techotronic
 * @subpackage All in one Favicon
 *
 * @since 3.2
 * @author Arne Franken
 *
 * Object that handles all actions in the WordPress frontend
 */
class AioFaviconFrontend {

    /**
     * Constructor
     *
     * @since 3.2
     * @access public
     * @access static
     * @author Arne Franken
     *
     * @param array $aioFaviconSettings user settings
     */
    //public static function AioFaviconFrontend($aioFaviconSettings) {
    function AioFaviconFrontend($aioFaviconSettings) {

        $this->aioFaviconSettings = $aioFaviconSettings;

        add_action('wp_head',array(& $this, 'aioFaviconRenderBlogHeader'));

        // Add meta tag with version number to the header
		add_action('wp_head',array(& $this, 'renderMetaTag'));

        //only add link to meta box
        if(isset($this->aioFaviconSettings['removeLinkFromMetaBox']) && !$this->aioFaviconSettings['removeLinkFromMetaBox']){
            add_action('wp_meta',array(& $this, 'renderMetaLink'));
        }

    }

    // AioFaviconFrontend()

    /**
     * Renders Favicon
     *
     * @since 1.0
     * @access public
     * @author Arne Franken
     */
    //public function aioFaviconRenderBlogHeader() {
    function aioFaviconRenderBlogHeader() {
        if (!empty($this->aioFaviconSettings)) {
            foreach ((array) $this->aioFaviconSettings as $type => $url) {
                if (!empty($url)) {
                    if (preg_match('/frontend/i', $type)) {
                        if (preg_match('/ico/i', $type)) {
                            ?>
                            <link rel="shortcut icon" href="<?php echo htmlspecialchars($url)?>"/><?php
                        } else if (preg_match('/gif/i', $type)) {
                            ?>
                            <link rel="icon" href="<?php echo htmlspecialchars($url)?>" type="image/gif"/><?php
                        } else if (preg_match('/png/i', $type)) {
                            ?>
                            <link rel="icon" href="<?php echo htmlspecialchars($url)?>" type="image/png"/><?php
                        } else if (preg_match('/apple/i', $type)) {
                            ?>
                            <link rel="apple-touch-icon" href="<?php echo htmlspecialchars($url)?>"/><?php
                        }
                    }
                }
            }
        }
    }

    // aioFaviconRenderBlogHeader()

    /**
     * Renders plugin link in Meta widget
     *
     * @since 1.0
     * @access public
     * @author Arne Franken
     */
    //public function renderMetaLink() {
    function renderMetaLink() { ?>
        <li><?php _e('Using',AIOFAVICON_TEXTDOMAIN);?> <a href="http://www.techotronic.de/plugins/all-in-one-favicon/" target="_blank" title="<?php echo AIOFAVICON_NAME ?>"><?php echo AIOFAVICON_NAME ?></a></li>
    <?php }

    // renderMetaLink()

    /**
     * Renders plugin Meta tag
     *
     * @since 1.3
     * @access public
     * @author Arne Franken
     */
    //public function renderMetaTag() {
    function renderMetaTag() {
?>

<meta name="<?php echo AIOFAVICON_NAME ?>" content="<?php echo AIOFAVICON_VERSION ?>" />
<?php }

    // renderMetaTag()
}

// AioFaviconFrontend()
?>