        <div class="row">
            <div class="col-sm-3 col-md-3">
                <div class="form-group">
                    <label class="label-control">Nombre del indicador</label>
                    <select id="cmbIndicador" name="cmbIndicador" class="form-control"></select>
                </div>
                <div class="form-group">
                    <label class="label-control">Categoria</label>
                    <select id="cmbCategoria" name="cmbCategoria" class="form-control"></select>
                </div>
                <div class="form-group">
                    <label class="label-control">Variable</label>
                    <ul id="lstVariable" class="list-group"></ul>
                </div>
            </div>
            <div class="col-sm-9 col-md-9">
                <div id="mnuSearch" class="input-group">
                    <div class="input-group-btn">
                        <button type="button" id="btnSearchType" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-search="municipio" aria-haspopup="true" aria-expanded="false">Municipio <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-value="municipio">Municipio</a></li>
                            <li><a href="#" data-value="seccion">Seccion</a></li>
                        </ul>
                    </div><!-- /btn-group -->
                    <input type="text" id="search" name="search" placeholder="calle,colonia,municipio" value="" class="form-control">
                    <span class="input-group-btn">
                        <button type="button" id="btnSearch" class="btn btn-default">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
                <div id="maps">
                    <div class='cartodb-legend choropleth'>
                        <div class="legend-title" style="color:#284a59">Personas</div>
                        <ul>
                            <li class="graph leg" style="border-radius: 0; border:none">
                                <div class="colors">
                                    <div class="quartile" style="background-color:#FFFFB2"></div>
                                    <div class="quartile" style="background-color:#FECC5C"></div>
                                    <div class="quartile" style="background-color:#FD8D3C"></div>
                                    <div class="quartile" style="background-color:#F03B20"></div>
                                    <div class="quartile" style="background-color:#BD0026"></div>
                                </div>
                                <div class="colors" style="font-weight:normal; text-align: center">
                                        <div class="quartile" style="padding-top: 5px" >[0-32]</div>
                                        <div class="quartile" style="padding-top: 5px" >[32-65]</div>
                                        <div class="quartile" style="padding-top: 5px" >[65-97]</div>
                                        <div class="quartile" style="padding-top: 5px" >[97-136]</div>
                                        <div class="quartile" style="padding-top: 5px" >[136-537]</div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/template" id="tplVariable">
        <% _.each(rc,function(item){ %>
            <li class="list-group-item">
                <input type="radio" id="indicador" name="indicador" value="<%- item.total %>">
                <label><%- item.variable %></label>
            </li>
        <% }) %>
    </script>
    <script type="text/template" id="tplCartoCSS">
            #mich_manzanas[zoom >= 12]{
              polygon-fill: #FFFFB2;
              polygon-opacity: 0.8;
              line-color: #000;
              line-width: 0.5;
              line-opacity: 1;
            }
            #mich_manzanas[zoom >= 12][ <%- rc.variable %>  <= 537] {
               polygon-fill: #BD0026;
            }
            #mich_manzanas [zoom >= 12][ <%- rc.variable %> <= 136] {
               polygon-fill: #F03B20;
            }
            #mich_manzanas [zoom >= 12][ <%- rc.variable %> <= 97] {
               polygon-fill: #FD8D3C;
            }
            #mich_manzanas [zoom >= 12][ <%- rc.variable %> <= 65] {
               polygon-fill: #FECC5C;
            }
            #mich_manzanas [zoom >= 12][ <%- rc.variable %> <= 32] {
               polygon-fill: #FFFFB2;
            }
    </script>
    <script type="text/template" id="tplSql">
        SELECT manz.cartodb_id,manz.the_geom,manz.the_geom_webmercator, mig.cvegeo,mig.<%- rc.field %> FROM mich_manzanas manz inner join <%- rc.table %> mig on manz.cvegeo = mig.cvegeo
    </script>
    <script type="text/javascript" src="<?php echo base_url('js/cartodb/indicadores/function.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/cartodb/indicadores/events.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/cartodb/indicadores/leaflet.spin.js');?>"></script>
    


    <script type="text/javascript">
/*(function() {})() */

    mapHeight = document.getElementsByTagName('body')[0].clientHeight;
    posHeight = $("#maps").position().top;
    $("#maps").css("height",(mapHeight-posHeight-25) + "px");
    $("#maps").css("min-height","400px");

    var layerbase = 'http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png';
    var viz = 'https://pvalran.carto.com/api/v2/viz/9bf35bfa-f3de-11e6-abe5-0e3ff518bd15/viz.json';
    var mapdiv =  'maps';
    var param = {
            user:"pvalran"
            //api_key:"cfa2452ab0524c27f3550b99f2dc82066da90a04"
    };


    maps = new cdmxCarto(layerbase,viz,mapdiv,param);
    var fncallback = function(layer){
        mich_manz = layer.createSubLayer({
            sql: "SELECT * FROM mich_manzanas",
            cartocss: "#mich_manzanas{polygon-fill: #FF6600;polygon-opacity: 0;line-color: #000000;line-width: 1;line-opacity: 1.5;}"
        });
        var cmbIndicador= function(data){
            for(idx in data.rows){
                $("<option/>",{value:data.rows[idx].indicador,text:data.rows[idx].indicador}).appendTo("#cmbIndicador");    
            }
            
            $("#cmbIndicador option:first").prop("selected",true);
            $("#cmbIndicador").trigger("change");
        }
        maps.tosql(param,"select distinct indicador from indicadores_science",cmbIndicador,[]);
        
        
        layer.on("load", function() {
            maps._map.spin(false);
        });

        maps._map.spin(true);
    };

    maps.renderMap(fncallback);




    
</script>