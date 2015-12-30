jQuery (_) ->

    genderContext = document
        .querySelector '#gender-chart'
        .getContext '2d'

    salaryContext = document
        .querySelector '#salary-chart'
        .getContext '2d'

    dateContext = document
        .querySelector '#dates-chart'
        .getContext '2d'
        
    _.getJSON statsDataUrl, (data) ->
        new Chart genderContext
            .Pie data.gender
        new Chart salaryContext
            .Pie data.salary
        new Chart dateContext
            .Bar data.dates
