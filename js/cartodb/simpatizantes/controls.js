var btnGrp = L.control({position: 'bottomright'});

btnGrp.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'leaflet-bar'); // create a div with a class "info"
    
    //btnGrafica
    this._grafica = L.DomUtil.create('a','',this._div);
    this._imggrafica = L.DomUtil.create('img','',this._grafica);
    this._imggrafica.src = "./images/mActionOpenTable.png";
    $(this._imggrafica).css("width","24px");
    L.DomEvent.addListener(this._imggrafica,'click',this.fnLeyend,this);
    return this._div;
};

btnGrp.fnLeyend = function (objBtn) {
    $("#dvLeyend").toggle();
};
