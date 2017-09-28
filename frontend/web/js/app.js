/**
 *  @author Gevorg Avetisyan
 */

/**
 * menu is dropdown on hover
 */
$('.dropdown').hover(
    function(){
        $( this ).addClass('open')
    },
    function() {
        $( this ).removeClass('open');
    }
);