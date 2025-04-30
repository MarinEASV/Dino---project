<?php
$content = do_shortcode(
  '[trustindex data-widget-id="ede1d6245a9a52887346390af8b" no-registration="google"]'
);
// Show us exactly what the plugin returned:
echo '<pre style="background:#fee;border:1px solid #f00;padding:1rem;">';
echo htmlspecialchars( $content );
echo '</pre>';
?>
