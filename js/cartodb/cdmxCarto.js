var cdmxCarto = function(layerbase,viz,mapdiv,users,paramlayerbase={},parammapbase={}){

    this._layerbase = layerbase;
    this._paramlayerbase = paramlayerbase;
    this._parammapbase = {
        
        center : new L.LatLng(19.702822,-101.1910943),
        zoom : 14,
        minZoom: "0",
        maxZoom: "20",
        attribution: "CartoDB"
    };

	this._viz = viz;
    this._vizparam = {};

    this._el = mapdiv;
	this._layers = "";

    this._map = "";
    this._objlayerBase = "";
    this._user = users.user;
    this._api_key = users.api_key;
    this._sltfeature;
    this.functions;
}

cdmxCarto.prototype = {
    tosql: function(param,sql,callback,paramcall){
        var sqlExtent = new cartodb.SQL(param);
        sqlExtent.execute(sql).done(function(data) {

            if (paramcall.length > 0){
                var params = [];
                var idxparams = 0;
                params[idxparams] = data;

                for(idx in paramcall){
                    idxparams++;
                    params[idxparams] = paramcall[idx];
                }
                callback.apply(this,params);
            } else {
                callback(data);
            }
        }).error(function(errors) {
            console.log("errors:" + errors);
        });
    },

    _callbackbounry: function(data,map) {

        if (data.rows[0].ymax != '' && data.rows[0].ymin != '' && data.rows[0].xmax && data.rows[0].xmin != '') {
            var southWest = L.latLng(data.rows[0].ymax, data.rows[0].xmin),
            northEast = L.latLng(data.rows[0].ymin, data.rows[0].xmax),
            bounds = L.latLngBounds(southWest, northEast);
            map.fitBounds(bounds);
            //this.selectFeature(table,sqlfilter,layer);
        } else {
            console.log("errors: en la ejecucion del sql en cartodb");
        }
    },

    bounry: function (param,table,sqlfilter,layer,map) {
        var sqlExtent = new cartodb.SQL(param);
        var sql = "select max(xmax) as xmax,min(xmin) as xmin,max(ymax) as ymax,min(ymin) as ymin from (select ST_Xmax(ST_Extent(the_geom)) as xmax,ST_Xmin(ST_Extent(the_geom)) as xmin,ST_Ymax(ST_Extent(the_geom)) as ymax,ST_Ymin(ST_Extent(the_geom)) as ymin from " + table + " where " + sqlfilter + ") as ext"
        var params = [];
        params[0] = map;
        this.tosql(param,sql,this._callbackbounry,params);
    },

    selectFeature: function (table,sqlfilter,objmap){
        if(this._map.hasLayer(this._sltfeature)){
            this._map.removeLayer(this._sltfeature);
        }
        $.getJSON("https://"+objmap._user+".carto.com/api/v2/sql?format=GeoJSON&q=select * from " + table + " where " + sqlfilter+"&api_key="+objmap._api_key, function(data) {
            objmap._sltfeature = L.geoJson(data,{
                style: function (feature) {
                    return {color:'#03f',
                        weight: 5,
                        opacity:0.5,
                        fillColor:'#C4C5C6',
                        fillOpacity:0.2}
                },
                onEachFeature: function (feature, layers) {

                }
            }).addTo(objmap._map);
            objmap._sltfeature.bringToBack();
        });
    },

    toLyrSQL:function(sql,layer){
        
        this._layers.getSubLayer(layer).setSQL(sql);
    },

    toLyrCSS:function(layer,cartocss){
      this._layers.getSubLayer(layer).setCartoCSS(cartocss);  
    },

    toLyrSET:function(layer,cfg){
      this._layers.getSubLayer(layer).set(cfg);  
    },

	renderMap:function(callback){
        self = this;
        this._objlayerBase = L.tileLayer(this._layerbase,this._paramlayerbase);

        this._map = new L.Map(this._el, this._parammapbase), this._map.addLayer(this._objlayerBase);

        cartodb.createLayer(this._map,this._viz)
            .addTo(this._map)
            .on('done', function(layer) {
            self._layers = layer;
            callback(layer);
        }).error(function (err) {
            console.log(err);
        });
	},

    renderMapVis:function(callback){
        //this._objlayerBase = L.tileLayer(this._layerbase,this._paramlayerbase);

        //this._map = new L.Map(this._el, this._parammapbase), this._map.addLayer(this._objlayerBase);

        cartodb.createVis(this._map,this._viz,this._parammapbase).on('done', function(layer) {
            this._layers = layer;
            callback(layer);
        }).error(function (err) {
            console.log(err);
        });
	}
};