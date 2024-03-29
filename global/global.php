<?php /* Template Name: Example Template 111 */ ?>
<?php /* Template Name: Example Template 222 */ ?>
<?php

function wpc_component($name, $props = array()) {
  set_query_var('WPC_PROPS', $props);
  return get_template_part('components/' . $name . '/' . $name);
}

function wpc_render() {
  if (is_home() && is_front_page()) {
    return wpc_component('app-post-list');
  } else {
    if (is_home()) return wpc_component('app-post-list');
    if (is_front_page()) return wpc_component('app-page-single');
  }

  if (is_404()) return wpc_component('app-error');
  if (is_search()) return wpc_component('app-search');

  if (is_archive()) {
    return wpc_component('app-post-list');
  }

  if (is_single()) {
    if (get_post_type() == 'page') return wpc_component('app-page-single');
    if (get_post_type() == 'post') return wpc_component('app-post-single');
  }
}
