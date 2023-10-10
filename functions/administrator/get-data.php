<?php
function get_courses(){
    global $db;
    $sql = "SELECT * FROM `courses`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
}


function get_courses_count(){
    global $db;
    $sql = "SELECT * FROM `courses`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo count($result);
}

function get_students_count(){
    global $db;
    $sql = "SELECT s.*, u.status FROM `students` s LEFT JOIN `users` u ON s.user_id = u.id WHERE `status` = 'approved'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo count($result);
}

function get_graduate_students_count(){
    global $db;
    $sql = "SELECT * FROM `graduates`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo count($result);
}

function get_students_pending_count(){
    global $db;
    $sql = "SELECT s.*, u.status FROM `students` s LEFT JOIN `users` u ON s.user_id = u.id WHERE `status` = 'pending'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo count($result);
}

function get_announcements_count(){
    global $db;
    $sql = "SELECT * FROM `announcements`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo count($result);
}


function get_students_monthly($type = 'line'){
    global $db;
    $sql = "SELECT DATE_FORMAT(`created_at`, '%b %Y') AS month_year, COUNT(*) AS total_students
            FROM `students`
            GROUP BY DATE_FORMAT(`created_at`, '%b %Y')
            ORDER BY `created_at`";

    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    $labels = [];
    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $labels[] = $row['month_year'];
        $data[] = $row['total_students'];
    }
    
    $chartData = [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Students Registered',
                'fill' => true,
                'data' => $data,
                'backgroundColor' => 'rgba(78, 115, 223, 0.05)',
                'borderColor' => 'rgba(78, 115, 223, 1)'
            ]
        ]
    ];
    
    $chartDataJson = json_encode($chartData);  
    ?>
    <canvas data-bss-chart='{"type":"<?php echo $type?>","data":<?php echo $chartDataJson; ?>,"options":{"maintainAspectRatio":false,"legend":{"display":false,"labels":{"fontStyle":"normal"}},"title":{"fontStyle":"normal"},"scales":{"xAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"],"drawOnChartArea":false},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}],"yAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"]},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}]}}}'></canvas>
    <?php
}

function get_students_annual($type = 'line'){
    global $db;
    $sql = "SELECT DATE_FORMAT(`created_at`, '%Y') AS `year`, COUNT(*) AS total_students
        FROM `students`
        GROUP BY DATE_FORMAT(`created_at`, '%Y')
        ORDER BY `created_at`";

    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    $labels = [];
    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $labels[] = $row['year'];
        $data[] = $row['total_students'];
    }
    
    $chartData = [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Students Registered',
                'fill' => true,
                'data' => $data,
                'backgroundColor' => 'rgba(78, 115, 223, 0.05)',
                'borderColor' => 'rgba(78, 115, 223, 1)'
            ]
        ]
    ];
    
    $chartDataJson = json_encode($chartData);  
    ?>
    <canvas data-bss-chart='{"type":"<?php echo $type?>","data":<?php echo $chartDataJson; ?>,"options":{"maintainAspectRatio":false,"legend":{"display":false,"labels":{"fontStyle":"normal"}},"title":{"fontStyle":"normal"},"scales":{"xAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"],"drawOnChartArea":false},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}],"yAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"]},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}]}}}'></canvas>
    <?php
}