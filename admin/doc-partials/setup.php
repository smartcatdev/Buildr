<h2 class="section-heading">
    <?php _e( 'Setup & Installation', 'designr' ); ?>
</h2>

<h3 id="theme-setup" class="sub-heading">
    <?php _e( 'Theme Setup', 'designr' ); ?>
</h3>

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare ante convallis porta imperdiet. Praesent sed ligula ut mauris finibus dignissim et dictum magna. Phasellus vitae libero nec felis convallis dignissim. Pellentesque id maximus quam, quis lacinia massa. Nulla in ipsum nec magna tempus consectetur convallis in nulla. Duis non est diam. Nam dictum nibh vel ante hendrerit tincidunt. Proin arcu tortor, mollis consectetur nisi ac, gravida hendrerit mauris. Phasellus auctor vulputate lacus, commodo egestas velit posuere sit amet. Morbi mollis molestie elit, quis faucibus urna aliquam aliquet. Integer et aliquet magna. Mauris tempor commodo eros, eu aliquet nulla pellentesque sed. Nulla vestibulum eget enim eget commodo. Quisque sit amet felis nec nibh imperdiet tristique. Nam accumsan ultricies nisl, nec cursus felis ultricies nec.

<h3 id="companion-plugin" class="sub-heading">
    <?php _e( 'Companion Plugin', 'designr' ); ?>
</h3>

Nunc accumsan auctor risus ut suscipit. Donec ultricies, magna at porttitor vehicula, mauris turpis malesuada erat, mattis pulvinar est nulla ac urna. Quisque molestie urna ex, vitae viverra enim ullamcorper non. Sed augue nulla, ultricies ac lobortis non, sodales vel ligula. Vivamus malesuada, sapien non sodales volutpat, leo sapien faucibus diam, sit amet iaculis magna tortor quis risus. Mauris interdum pulvinar ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut arcu sem, laoreet et justo quis, eleifend faucibus nunc. Etiam sed dolor scelerisque, dapibus orci porta, semper diam. Donec vitae semper mi. In hac habitasse platea dictumst. Nulla facilisi. Fusce non velit magna. Nullam ullamcorper cursus felis, sit amet ornare risus. Integer tristique, neque vitae gravida sollicitudin, sapien mauris porta libero, pulvinar pellentesque massa est vitae ex. Donec elementum elementum lorem et elementum.

<?php
$query['autofocus[section]'] = 'title_tagline';
$section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
<a href="<?php echo esc_url( $section_link ); ?>">Link to title section</a>