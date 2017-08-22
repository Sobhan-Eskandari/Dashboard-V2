$( document ).ready(function() {

    //********************** Polar Doughnut Of Chat JS **********************//
    var ctx = document.getElementById("doughnutChart");
    var doughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                "Red",
                "Blue",
                "Yellow"
            ],
            datasets: [
                {
                    data: [300, 50, 100],
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56"
                    ],
                    hoverBackgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56"
                    ]
                }]
        }
    });

    //********************** Polar Chart Of Chat JS **********************//
    var ctx = document.getElementById("polarChart");
    var polarChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
            datasets: [{
                data: [
                    11,
                    16,
                    7,
                    3,
                    14
                ],
                backgroundColor: [
                    "#FF6384",
                    "#4BC0C0",
                    "#FFCE56",
                    "#E7E9ED",
                    "#36A2EB"
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                "Red",
                "Green",
                "Yellow",
                "Grey",
                "Blue"
            ]
        }
    });

    //********************** Polar Pie Of Chat JS **********************//
    var ctx = document.getElementById("pieChart");
    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [
                {
                    data: [300, 50, 100],
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56"
                    ],
                    hoverBackgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56"
                    ]
                }],
            labels: [
                "Red",
                "Blue",
                "Yellow"
            ]

        },
        options: {
            elements: {
                arc: {
                    borderColor: "#fff"
                }
            }
        }
    });



//********************** Bar Chart Of Chat JS **********************//
    var ctx = document.getElementById("radarChart");
    var radarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
            datasets: [
                {
                    label: "My First dataset",
                    backgroundColor: "rgba(179,181,198,0.2)",
                    borderColor: "rgba(179,181,198,1)",
                    pointBackgroundColor: "rgba(179,181,198,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(179,181,198,1)",
                    data: [65, 59, 90, 81, 56, 55, 40]
                },
                {
                    label: "My Second dataset",
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    pointBackgroundColor: "rgba(255,99,132,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(255,99,132,1)",
                    data: [28, 48, 40, 19, 96, 27, 100]
                }
            ]

        },
        options: {
            scale: {
                reverse: true,
                ticks: {
                    beginAtZero: true
                }
            }
        }
    });

});
