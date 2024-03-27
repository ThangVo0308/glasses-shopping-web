<div id="statistic">
    <h2> <i class="fa-solid fa-chart-column"></i><span>Thống kê</span></h2>
    <div id="statistic-type1">
        <h2> Doanh thu </h2>
        <br>
        <input type="year" class="dateStart" value="<?= date("Y")?>">
        <input type="year" class="dateEnd" value=<?= date("Y") ?>>
        <select name="" id="" class="typeStatictis" >
            <option value="1">Theo năm</option>
            <option value="2">Theo tháng</option>
            <option value="3">Theo tuần</option>
            <option value="4">Theo ngày</option>
        </select>
        <Button value="" onclick="statistic1()">Thống kê</Button>
        

<script>Highcharts.chart("container", {
    chart: {
        type: "line",
    },
    title: {
        text: title,
    },
    xAxis: {
        categories: categories,
    },
    yAxis: {
        title: {
            text: "Total sales revenue",
        },
    },
    plotOptions: {
        series: {
            color: "#f2623e",
            dataLabels: {
                enabled: true,
            },
            marker: {
                enabled: false // Disable markers on the line
            }
        }
    },
    series: [
        {
            name: nameLine,
            data: formattedData.map((item) => item.total),
        },
    ],
});
</script>

      <figure class="highcharts-figure">
            <div id="container"></div>
        </figure>
    </div>
    <div id="statistic-type2">
        <h2> Số lượng sản phẩm đã bán ra</h2>
        <br>
        <input type="date" class="dateStart" value="<?= date("Y") . "-01-01" ?>">
        <input type="date" class="dateEnd" value=<?= date("Y-m-d") ?>>
        <select name="" id="" class="typeStatictis">
            <option value="1">Loại sản phẩm</option>
            <option value="2">Sẩn phẩm</option>
        </select>
        <Button value="" >Thống kê</Button>
    </div>
    <div id="statistic-type3">
        <h2> Top sản phẩm được bán ra nhiều nhất</h2>
        <br>
        <input type="date" class="dateStart" value="<?= date("Y") . "-01-01" ?>">
        <input type="date" class="dateEnd" value=<?= date("Y-m-d") ?>>
        <select name="" id="" class="typeStatictis">
            <option value="1">Lọại sản phẩm</option>
            <option value="2">Sản Phẩm</option>
        </select>
        <input type="text" placeholder="Số lượng top" class="limit" value="3">
        <Button value="" >Thống kê</Button>
        
    </div>
</div>