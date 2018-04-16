( function( api ) {

	// Extends our custom "companion-plugin" section.
	api.sectionConstructor['buildr_docs'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
