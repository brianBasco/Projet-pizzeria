<?php

echo '<form class="formPHP" method="POST" action="modifier.php">
            <table>
                <input style="display:none" type="number" name="id" value='.$this->id.' />
                <tr>
                    <td>
                        <input type="text" name="nom" value="'.$this->nom.'" />
                    </td>
                    <td>
                        <input type="number" step="0.5" name="prix"  value="'.$this->prix.'" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="full-width" type="text" name="ingredients" value="'.$this->ingredients.'" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="btn btn-danger full-width" type="submit" name="modifier" value="Modifier" />
                    </td>
                    <td>
                        <input class="btn btn-warning full-width" type="submit" name="supprimmer" value="Supprimmer" />
                    </td>
                </tr>
            </table>
        </form>';

?>