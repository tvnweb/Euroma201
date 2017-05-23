<ul class="filter">
            <div class="titolo_filter"><?php _e(utf8_encode($lang_filter)); ?></div>
			<li class="filterparams-<?php echo $id_filter_ul; ?>">
                     		<div class="budget">
                                <label>BUDGET</label>
                                
                                <div class="slider"></div>
                                 <span class="eurostart">&euro;</span><input type="text" class="start" value="1" id="filterparams-<?php echo $id_filter_ul; ?>-start">
                                 <input type="text" class="end" value="4999" id="filterparams-<?php echo $id_filter_ul; ?>-end">
                                 <span class="euroend">&euro;</span>
                                <input type="hidden" class="appoggio">
                                <input type="hidden" class="appoggio_start" placeholder="appoggio_start">
                                <input type="hidden" class="appoggio_end" placeholder="appoggio_end">
                                <div class="clearer"></div>
							</div>
                            <div class="categorie">
                            <label><?php _e(utf8_encode($lang_categorie)); ?></label><br />
							<?php foreach($arrayTag as $o){?>
                            <div class="row">
                            	<input type="checkbox" name="categorie[]" value="<?php echo $o['termid'];?>" /><?php 
                                    if ($o['termid']==463){
                                    echo "<span style='color:red'>".ucfirst($o['name'])."</span><br/><br/>";
                                        ?>

                                    <?php }else{?><?php


                                    

                                echo ucfirst($o['name']);

                            }                 ?>
                                <?php 
									/*$subcategories=getsubcategories($o['id']);
									if ($subcategories and count($subcategories)>0){*/
									if (false){
										?><div class="sottocategorie"><?php
										foreach($subcategories as $s){
											?>
                                            <div class="subrow">
                                            <input type="checkbox" name="sottocategorie[]" value="<?php echo $s['id'];?>" /><?php //echo $s['nametag']; ?><?php 


                                            _e(utf8_encode($s['nametag'])); ?>
                                            </div><?php
										}
										?></div><?php
									}
								?>
                            </div>
                            <div class="clearer"></div>
							<?php }?>
                            </div>
                            <div class="eta">
                             <label><?php _e(utf8_encode($lang_eta)); ?></label>
                             <div class="row"><input type="checkbox" name="eta[]" value="0-9" /> 0-9</div>
                             <div class="row"><input type="checkbox" name="eta[]" value="10-19" /> 10-19</div>
                             <div class="row"><input type="checkbox" name="eta[]" value="20-99" /> 20-29</div>
                             <div class="row"><input type="checkbox" name="eta[]" value="29-99" /> 29+</div>
                             <div class="clearer"></div>
                            </div> 
                            <div class="genere">
                             <label><?php _e(utf8_encode($lang_sesso)); ?></label><!--
                             <div class="row"><input type="checkbox" name="genere[]" value="U" /> Unisex</div>-->
                             <div class="row"><input type="checkbox" name="genere[]" value="M" /> <?php _e(utf8_encode($lang_uomo)); ?></div>
                             <div class="row"><input type="checkbox" name="genere[]" value="F" /> <?php _e(utf8_encode($lang_donna)); ?></div>
                                <div class="clearer"></div>
                            </div>
                           
				
				<div class="cerca">
					<?php _e(utf8_encode($lang_bottonricerca)); ?>
				</div>
				<div class="bottoni" style="display:none;">
					<div class="bottoneRicerca"><img src="<?php bloginfo("template_url");?>/images/nullpix.png" style="width:60px;height:67px" title="<?php _e(utf8_encode($lang_cercaRegalo)); ?>"/></div>
				</div>
				<div class="spinner" style="display:none"><img src="<?php bloginfo("template_url");?>/images/ajax-loader.gif" class="loaderimg" style="margin-left: 21px; margin-top: 16px;"/></div>			
				
				<div class="clear"></div>
			</li>
			<script type="text/javascript">
				jQuery(document).ready(function(){
					addHandlerWishList("li.filterparams-<?php echo $id_filter_ul; ?>");
				});
			</script>				
		</ul>	