<?php 
add_action('admin_menu', 'infosContact');

function infosContact()
{
    add_menu_page('Infos Contact', 'Infos Contact', 'activate_plugins', 'infosContact', 'menuInfosContact', null, 81);
}

function menuInfosContact()
{
    if(isset($_POST['infosContactUpdate']))
    {
        foreach($_POST['options'] as $name => $value)
        {
            if(empty($value))
            {
                delete_option($name);
            }
            else
            {
                update_option($name, $value);
            }
        }
?>
        <div id='message' class='updated fade'>
            <p><strong> Bravo!</strong> Options sauvegardées avec succès</p>
        </div>
<?php
    }
?>
    <div class='wrap theme-options-page'>
        <div id='icon-options-general' class='icon32'><br></div>
        <h2>Informations de Contacts</h2>
        <form action='' method='post'>
            <div class='theme-options-group'>
                <table cellspacing='0' class='widefat options-table'>
                    <thead>
                        <tr>
                            <th colspan='2'> Mes Informations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope='row'>
                            <label for='mail'>Email</label>
                        </th>
                        <td>
                        <input type='text' id='mail' name='options[mail]' value="<?php echo get_option('mail', ''); ?>" size='50'>
                        </td>
                        </tr>
                        <tr>
                        <th scope='row'>
                            <label for='tel'>Téléphonne</label>
                        </th>
                        <td>
                        <input type='text' id='mail' name='options[tel]' value="<?php echo get_option('tel', ''); ?>" size='50'>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class='submit'>
                <input type='submit' name='infosContactUpdate' class='button-primary autowidth' value='Sauvegarder'>
            </p>
        </form>
    </div>
    </div>
<?php                         
}

?>
