<?php
/**
 * A custom WordPress comment walker class for showing comments in a Bootstrap 4 theme.
 *
 * @package     WP Bootstrap 4 Comment Walker
 * @version     1.0.0
 * @author      Ole Kristian Losvik, based on wordk by Aymene Bourafai
 * @license     http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link        https://github.com/bourafai/wp-bootstrap-4-comment-walker
 */

class Bootstrap_Comment_Walker extends Walker_Comment {
	/**
	 * Output a comment in the HTML5 format.
	 *
	 * @since 1.0.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param object $comment the comments list.
	 * @param int    $depth   Depth of comments.
	 * @param array  $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( $args['style'] === 'div' ) ? 'div' : 'li';
?>		
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'has-children media' : ' media' ); ?>>
			

			<div class="media-body " id="div-comment-<?php comment_ID(); ?>">
				<div class="media">
					<div class="d-flex mr-3">
						<?php if ( $args['avatar_size'] != 0  ): ?>
							<?php echo get_avatar( $comment, $args['avatar_size'],'mm','', array('class'=>"comment_avatar rounded-circle") ); ?>
						<?php endif; ?>
					</div>
					<div class="media-body mb-5">
                        <h4 class="media-heading "><?php echo get_comment_author_link() ?>
                            <time class="small text-muted" datetime="<?php comment_time( 'c' ); ?>">
                                        <?php comment_date() ?>,
                                        <?php comment_time() ?>
                            </time>
                        </h4>
                        <div class="comment-content">
                        <?php comment_text(); ?>
                        <div class="d-inline d-block">
							<?php edit_comment_link( __( 'Edit' ), '', '' ); ?>
							<?php
								comment_reply_link( array_merge( $args, array(
									'add_below' => 'div',
									'depth'     => $depth,
									'max_depth' => $args['max_depth'],
									'before'    => '',
									'after'     => ''
								) ) );	
							?>
						</div>
                     </div><!-- .comment-content -->
                    

					</div><!-- .comment-metadata -->
				</div>
				<div class="warning-color">
					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="card-text comment-awaiting-moderation label label-info text-muted small"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
					<?php endif; ?>				


								
				<!-- </div> -->

			<!-- </div>		 -->
<?php
	}	
}