var submarine_body_data = {
    シャーク: [-10, 30, 20, 40, 20],
    ウンキウ: [15, 10, 0, 60, 15],
    ホエール: [-15, 55, 35, 15, 20],
    シーラカンス: [40, -10, 25, 40, 25],
    シルドラ: [10, 75, 30, -15, 5],
};

var submarine_front_data = {
    シャーク: [50, 40, 10, -20, 15],
    ウンキウ: [60, 20, 20, -15, 10],
    ホエール: [25, 60, -15, 20, 15],
    シーラカンス: [65, 10, -10, 30, 0],
    シルドラ: [45, 30, -15, 40, 40],
};

var submarine_tail_data = {
    シャーク: [-30, 20, 60, 30, 15],
    ウンキウ: [15, 0, 30, 40, 25],
    ホエール: [15, 20, 0, 55, 15],
    シーラカンス: [10, 25, 35, 25, 25],
    シルドラ: [20, 60, 35, -15, 5],
};

var submarine_bridge_data = {
    シャーク: [20, 20, 20, 20, 20],
    ウンキウ: [25, 5, 25, 30, 30],
    ホエール: [0, 25, 20, 45, 40],
    シーラカンス: [55, 20, 35, -15, 50],
    シルドラ: [55, 20, -5, 30, 60],
};

var submarine_data = createSubmarineData();

function createSubmarineData() {
    base = [];
    Object.keys(submarine_body_data).forEach(function (body_name, body_val) {
        Object.keys(submarine_front_data).forEach(function (front_name, front_val) {
            Object.keys(submarine_tail_data).forEach(function (tail_name, tail_val) {
                Object.keys(submarine_bridge_data).forEach(function (bridge_name, bridge_val) {
                    key = body_name + '+' + front_name + '+' + tail_name + '+' + bridge_name;
                    base[key] = {
                        艦体: body_name,
                        艦首: front_name,
                        艦橋: bridge_name,
                        艦尾: tail_name,
                        探査: submarine_body_data[body_name][0] + submarine_front_data[front_name][0] + submarine_tail_data[tail_name][0] + submarine_bridge_data[bridge_name][0],
                        収集: submarine_body_data[body_name][1] + submarine_front_data[front_name][1] + submarine_tail_data[tail_name][1] + submarine_bridge_data[bridge_name][1],
                        巡航速度: submarine_body_data[body_name][2] + submarine_front_data[front_name][2] + submarine_tail_data[tail_name][2] + submarine_bridge_data[bridge_name][2],
                        航続距離: submarine_body_data[body_name][3] + submarine_front_data[front_name][3] + submarine_tail_data[tail_name][3] + submarine_bridge_data[bridge_name][3],
                        運: submarine_body_data[body_name][4] + submarine_front_data[front_name][4] + submarine_tail_data[tail_name][4] + submarine_bridge_data[bridge_name][4],
                        合計: 0,
                    };
                    base[key].合計 = base[key].探査 + base[key].収集 + base[key].巡航速度 + base[key].運;
                });
            });
        });
    });
    return base;
}

function setColor(name) {
    var color = '';

    if (name == 'シャーク') {
        color = 'text-danger';
    } else if (name == 'ウンキウ') {
        color = 'text-secondary';
    } else if (name == 'ホエール') {
        color = 'text-success';
    } else if (name == 'シーラカンス') {
        color = 'text-warning';
    } else if (name == 'シルドラ') {
        color = 'text-info';
    }
    return color;
}


$(function () {
    Object.keys(submarine_data).forEach(function (name, key) {
        line = '<tr>';
        //line += '<td>' + name + '</td>';
        line += '<td class="' + setColor(submarine_data[name].艦体) + '">' + submarine_data[name].艦体 + '</td>';
        line += '<td class="' + setColor(submarine_data[name].艦尾) + '">' + submarine_data[name].艦尾 + '</td>';
        line += '<td class="' + setColor(submarine_data[name].艦首) + '">' + submarine_data[name].艦首 + '</td>';
        line += '<td class="' + setColor(submarine_data[name].艦橋) + '">' + submarine_data[name].艦橋 + '</td>';
        line += '<td class="">' + submarine_data[name].探査 + '</td>';
        line += '<td class="">' + submarine_data[name].収集 + '</td>';
        line += '<td class="">' + submarine_data[name].巡航速度 + '</td>';
        line += '<td class="">' + submarine_data[name].航続距離 + '</td>';
        line += '<td class="">' + submarine_data[name].運 + '</td>';
        line += '<td class="">' + submarine_data[name].合計 + '</td>';
        line += '</tr>';
        $('#list-body').append(line);
    });
});