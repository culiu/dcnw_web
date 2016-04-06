<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> DCNW profiling </title>
        <script type="text/javascript" src="d3/d3.min.js"></script>
    </head>

    <body> 
        <?php
          $latencies = array(
            array(1,1,0),
            array(1, 2, 1800),
            array(1, 3, 3000),
            array(1, 4, 6000),
            array(1, 5, 2432),
            array(1, 6, 2342),
            array(2, 1, 1900),
            array(2, 2, 0),
            array(2, 3, 3100),
            array(2, 4, 6000),
            array(2, 5, 3243),
            array(2, 6, 2342),
            array(3, 1, 2000),
            array(3, 2, 3300),
            array(3, 3, 0),
            array(3, 4, 6000),
            array(3, 5, 1232),
            array(3, 6, 3224),
            array(4, 1, 6000),
            array(4, 2, 6000),
            array(4, 3, 6000),
            array(4, 4, 0),
            array(4, 5, 6000),
            array(4, 6, 6000),
            array(5, 1, 3000),
            array(5, 2, 3242),
            array(5, 3, 2432),
            array(5, 4, 6000),
            array(5, 5, 0),
            array(5, 6, 3249),
            array(6, 1, 3242),
            array(6, 2, 2000),
            array(6, 3, 2693),
            array(6, 4, 6523),
            array(6, 5, 2000),
            array(6, 6, 0)
          );
        ?> 

        <script type="text/javascript">
            var w = 800;
            var h =800;

            var dataset = <?php echo json_encode($latencies)?>;

            var svg = d3.select("body")
                                .append("svg")
                                .attr("width", w)
                                .attr("height", h);

            svg.selectAll("circle")
                  .data(dataset)
                  .enter()
                  .append("circle")
                  .attr("cx", function(d) { return d[0] * 100})
                  .attr("cy", function(d) {return d[1] * 100})
                  .attr("r", function(d) {return 10})
                  .attr("fill", function(d) {
                    if (d[2] < 2000)
                        {return "green"}
                    else if (d[2] < 3400)
                        {return "yellow"}
                    else
                        {return "red"}
                  });
        </script>
    </body>
</html>
