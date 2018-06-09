<?php

    echo '
    <div id="'.$this->id.'" class="unePizza">
        
               
                    <input id="nom'.$this->id.'" type="text" value="'.$this->nom.'" />                    
                                
                
                   
                       
                            <button class="btn btn-plus" onclick="ajoutPizza(\'+\','.$this->id.')">+</button>
                       
                        
                            <button class="btn btn-danger" onclick="ajoutPizza(\'-\','.$this->id.')">-</button>
                        
                       
                            <input id="qte'.$this->id.'" class="uneQte" value=0 readonly />
                        
                    
                              			
                    
        
    </div>'

?>