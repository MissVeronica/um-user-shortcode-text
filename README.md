# UM User Shortcode Conditional Text

Returns a conditional text if user meta value condition is true.

## Usage 
<code>[um_user_text user_id="" meta_key="" meta_value="" ]Conditional text[/um_user_text] </code>

Leave user_id empty if you want to retrieve the current user's meta value for the conditional test.

meta_key is the field name that you've set in the UM form builder

meta_value is the conditional value for displaying conditional text

You can modify the returned conditional text with the filter hook <code>'um_user_shortcode_text_filter__{$meta_key}'</code>
 
## Updates

Current version 1.0.0
## Installation

Download the zip file and install as a WP Plugin, activate the plugin.
