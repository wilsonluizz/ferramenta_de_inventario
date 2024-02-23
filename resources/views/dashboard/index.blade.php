@extends('layouts.app')

@section('content')
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    
    <style>
        .charts-3x1 {
            width: 100%;
            min-height: 300px;
        }

        .charts-3x05 {
            width: 100%;
            min-height: 150px;
        }

        @media only screen and (min-width: 1024px) {
            .charts-3x05 {
                min-height: 200px;
            }

            .charts-3x1 {
                min-height: 350px;
            }

            #map {
                min-height: 724px;
            }
        }

    </style>

    <div class="card">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-8">
                    <h3 class="pt-1"><i class="bi bi-info-lg me-3"></i> Dashboard v1.0</h3>
                </div>
                <div class="col-4 text-end"></div>
            </div>
        </div>

        <div class="card-body">

            <div class="row pb-1">

                <div class="col-sm-2">
                    <div class="fs-4 fw-bold d-block">Localidades* </div>
                    <div class="fs-4 fw-bold d-block text-primary" id="localidadesN"></div>
                    <div class="text-secondary d-block"><small>*Exceto residenciais</small></div>
                </div>

                <div class="col-sm-2">
                    <div class="fs-4 fw-bold d-block">Centros de custo</div>
                    <div class="fs-4 fw-bold d-block text-primary" id="centrosDeCustoN"></div>
                </div>

                <div class="col-sm-8">
                    <div class="fs-4 fw-bold d-block">Equipamentos</div>
                    <div class="fs-4 fw-bold d-block text-primary" id="equipamentosN"></div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <div id="map" clas="col-sm-12"></div>
                </div>

                <div class="col-sm-12 col-lg-4">
                    <div class="col-12 pb-4">
                        <div id="chart1" class="charts-3x1 bg-light"></div>
                    </div>
    
                    <div class="col-12">
                        <div id="chart2" class="charts-3x1 bg-light"></div>
                    </div>
                </div>
            </div>
            

            <div class="row charts-3x05 p-0 m-0 d-none">
                <div id="chart0" class="charts-3x05 bg-light"></div>
            </div>

        </div>
    </div>

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.2/dist/echarts.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script type="text/javascript">

        var map = L.map('map').setView([-14, -56.652855], 4);


        $.get('api/dashboard-data').done(function(data) {
            
            
            centrosDeCustoN.append(data.centrosDeCusto.titulo.length);
            localidadesN.append(data.local.titulo.length);
            
            var arr = [];
            
            var arrayLength = data.tipo.titulo.length;
            for (var i = 0; i < arrayLength; i++) {
                var item = {value: data.tipo.n[i] ,name:data.tipo.titulo[i]};;
                arr.push(item);
            }
            
            equipamentosN.append(data.equipamentos);
            
            // Chart 0
            chart0.setOption({
                title: {
                    text: 'Equipamentos por tipo (valores fictícios)',
                    top: '1%'
                },

                tooltip: {
                    trigger: 'item'
                },

                legend: {
                    bottom: '5%',
                    left: 'center',
                    
                    // doesn't perfectly work with our tricks, disable it
                    selectedMode: false
                },

                series: [
                    {
                    type: 'pie',

                    radius: ['40%', '70%'],
                    center: ['50%', '70%'],

                    // adjust the start angle
                    startAngle: 180,
                    label: {
                        show: true,

                        formatter(param) {
                            // correct the percentage
                            return param.name + ' (' + param.percent * 2 + '%)';
                        }
                    },
                    data: [
                        { value: 17, name: 'Em estoque' },
                        { value: 130, name: 'Emprestados' },
                        {
                        
                        // make an record to fill the bottom 50%
                        value: 147,

                        itemStyle: {
                            // stop the chart from rendering this piece
                            color: 'none',
                            decal: {
                                symbol: 'none'
                            }
                        },
                        label: {
                            show: false
                        }
                        }
                    ]
                    }
                ]
            });

            // Chart 1
            chart1.setOption({
                title: {
                    text: 'Equipamentos por tipo',
                    top: '1%'
                },

                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    bottom: '1%',
                    left: 'center'
                },

                series: [
                    {
                        name: 'Tipo de equipamento',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        avoidLabelOverlap: false,
                        itemStyle: {
                            borderRadius: 10,
                            borderColor: '#fff',
                            borderWidth: 2
                        },

                        label : {
                            show: true, position: 'inner',
                            formatter : function (params){
                                return  params.value
                            },
                        },

                        labelLine: {
                            show: false
                        },
                        data: arr,
                    }
                ]
            });

            // Chart 2
            chart2.setOption({
                title: {
                    text: 'Equipamentos por centro de custos',
                    top: '1%'
                },
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                    type: 'shadow'
                    }
                },
                
                legend: {
                    show: false,
                },
                
                label: {
                    show: true,
                    position: 'insideLeft',
                },

                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: {
                    type: 'value',
                    
                    boundaryGap: [0, 0.01],
                },
                yAxis: {
                    type: 'category',
                    data: data.centrosDeCusto.titulo,
                    
                },

                series: [
                    {
                        name: 'Equipamentos',
                        type: 'bar',
                        data: data.centrosDeCusto.n,
                    },
                ]
            });
            
            for (var i = 0; i < data.local.titulo.length; i++) {
                L.marker([data.local.lat[i], data.local.lon[i]]).addTo(map)
                .bindPopup('<b>' + data.local.titulo[i] + '</b>');
            }

        });

        // Chart0
        var chart0 = echarts.init(document.getElementById('chart0'));

        // Chart1
        var chart1 = echarts.init(document.getElementById('chart1'));

        // Chart2
        var chart2 = echarts.init(document.getElementById('chart2'));

        var centrosDeCustoN = document.getElementById('centrosDeCustoN');
        var equipamentosN = document.getElementById('equipamentosN');

        window.addEventListener('resize', function() {
            chart0.resize();
            chart1.resize();
            chart2.resize();
        });

        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
            maxZoom: 20
        }).addTo(map);
        
      </script>
      
@endsection