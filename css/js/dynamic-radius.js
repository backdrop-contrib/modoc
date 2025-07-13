/**
 * @file
 * Sets global CSS custom properties for the Modoc theme.
 *
 *  --brdr-radius  → blocks, cards, generic containers
 *  --btn-radius   → buttons (can fall back to block value)
 */
(function ($, Drupal) {
  'use strict';

  Drupal.behaviors.modocBorderRadius = {
    attach: function (context) {
      // Run only once per page (Backdrop calls attach on every AJAX fragment).
      if (context !== document) { return; }

      // Helper → append 'px' if the editor entered only digits.
      function normalise(value, fallback) {
        value = value || fallback || '5px';
        return /^\d+$/.test(value) ? value + 'px' : value;
      }

      // 1. Pull values the site-builder saved in theme settings.
      var blockRadius  = normalise(Drupal.settings.modoc.block_corner_radius);
      var buttonRadius = normalise(
        Drupal.settings.modoc.button_corner_radius,
        blockRadius        // fallback: use the block radius if button not set
      );

      // 2. Expose them as custom properties on <html>.
      var rootStyle = document.documentElement.style;
      rootStyle.setProperty('--brdr-radius', blockRadius);
      rootStyle.setProperty('--btn-radius',  buttonRadius);
    }
  };

})(jQuery, Drupal);
