<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: rgb(250, 238, 238);
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            height: 100vh;
            margin: 0;
            font-size: 1.1rem;
            color: rgb(31, 31, 214);
            box-sizing: border-box
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            padding: 100px 0 0 0;
            display: flex;
            justify-content: center;
            width: calc(500px * 3);
            margin: 0 auto;
            flex-wrap: wrap;
        }


        .position-ref {
            position: relative;
        }

        ul {
            width: 440px;
            margin-right: 20px;

        }

    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <h3>Cú pháp mảng</h3>
            <ul>
                <li>truy suất vị trí : arr[vi tri]</li>
                <li>Length : đếm số phần tử của mảng</li>
                <li>Join() : gộp tất cả phần tử vd: arr.join();</li>
                <li>valueOf() : giống join nhưng ngăn cách bằng dấu phẩy</li>
                <li>push() : thêm phần tử vào cuối mảng vd: arr.push(3,8)</li>
                <li>pop() : xóa phan tử cuối vd: arr.pop()</li>
                <li>unshift() : thêm phần tử vào đầu mảng vd: arr.unshift(3,8) </li>
                <li>shift() : xóa phan tử đầu vd: arr.shift()</li>
                <li>splice() : thêm phần tử vào mảng theo một vị trí xác định vd: arr.splice(index, howmany, item1, ....., itemX)</li>
                <li>concat() : ghép 2 mảng lại với nhau. vd: arr1.concat(arr2)</li>
                <li>slice() : lấy ra một hoặc một số phần tử trong mảng. vd: arr.slice(begin,end);</li>
                <li>sort() : sắp xếp lại mảng theo chiều tăng dần, nếu là số thì từ bé đến lớn, chữ thì sắp xếp theo alpha(a-z). vd: arr.sort()</li>
                <li>reverse() : đảo ngược vị trí các phần tử của mảng. vd: arr.reverse()</li>
            </ul>
        </div>

        <div class="content">
            <h3>DOM HTML</h3>
            <ul>
                <li>Tìm thẻ HTML thông qua ID: document.getElementById('idName');</li>
                <li>Tìm thẻ HTML thông qua class: document.getElementsByClassName('className');</li>
                <li>Tìm thẻ HTML thông qua tagName: document.getElementsByTagName('tagName');</li>
                <li>Tìm kiếm thành phần con trong thành phần: document.querySelectorAll('select')</li>
                <li>Lấy nội dung: element.innerHTML</li>
                <li>Thay đổi nội dung: element.innerHTML = 'Giá trị mới';</li>
                <li>Lấy và thay đổi nội dung dưới dạng văn bản: element.innerText</li>
                <li>Thay đổi nội dung: element.innerText = 'Giá trị mới';</li>
                <li>Tạo ra các attribute cho thẻ HTML: element.setAttribute('attrName','attrValue');</li>
                <li>Lấy ra giá trị của các attribute: element.getAttribute('AttrName');</li>
            </ul>
        </div>

        <div class="content">
            <h3>DOM CSS</h3>
            <ul>
                <li>Để CSS cho các thẻ HTMl bằng javascript các bạn dùng cú pháp: element.style.propertyName = "value";</li>
                <li>Và để lấy ra giá trị của thuộc tính css các bạn sử dụng cú pháp: element.style.propertyName;</li>
                <li>Đối với các thuộc tính có dấu gạch nối ngăn ở giữa như: margin-top, margin-bottom,...
                    Các bạn chuyển về dạng viết liền theo chuẩn lưng lạc đà. vd: margin-top thành marginTop</li>
            </ul>
        </div>

        <div class="content">
            <h3>DOM EVENT</h3>
            <ul>
                <li> Thêm sự kiện bằng HTML attribute: vd: <div id="series" onclick="alert('Bạn vừa click')">Học CSS</div>
                </li>
                <li>Tất cả các sự kiện js : https://www.w3schools.com/tags/ref_eventattributes.asp</li>
                <li>Thêm sự kiện bằng javascript: element.eventName = function ()
                    {
                    //code
                    }
                </li>
                <li>-Trong trường hợp mà đối tượng HTML các bạn chọn có nhiều hơn 1
                    thì các bạn cần phải chạy một vòng for để duyệt và add sự kiện cho nó.</li>
                <li style="color: red">
                    This trong js: This trong javascript nó cũng giống như các ngôn ngữ khác,
                    đều là đại diện cho đối tượng hiện tại mà nó đang được sử dụng.
                    vd: onclick="showInfo(this)",function showInfo(e) {alert(e.innerText);}
                </li>
            </ul>
        </div>

        <div class="content">
            <h3>addEventListener() và removeEventListener() trong javascript</h3>
            <ul>
                <li> Hàm addEventListeners(): element.addEventListener('eventName',functionName); hoặc
                    element.addEventListener('eventName',function(){//code});
                </li>
                <li>Hàm removeEventListener(): hàm removeEventListener() lại có tác dụng là xóa bỏ đi các sự kiện đang được áp lên sự kiện
                    element.removeEventListener('eventName', functionName, option);<br>
                    element là các đối tượng HTML (được gọi bằng các phương thức getElement...).
                    eventName là tên các sự kiện (bỏ chữ 'on') như click,mouseover,...
                    functionName là tên hàm mà bạn muốn xóa bỏ hành động.
                    option là các giá trị true|false (có thể bỏ trống).
                </li>
            </ul>
        </div>

        <div class="content">
            <h3>thuộc tính thường dùng trong DOM</h3>
            <ul>
                <li> activeElement: Thuộc tính này có tác dụng trả về đối tượng HTML đang focus. vd: document.activeElement.tagName;</li>
                <li>anchors: trả về một mảng đối tượng các thẻ a trong trang (không chứa href). vd: document.anchors.length</li>
                <li>Links: Trả về một mảng các đối tượng chứa các thẻ a, area có thuộc tính href trong trang. vd: document.links.length</li>
                <li>URL: Trả về đường dẫn của trang hiện tại. vd: document.URL;</li>
                <li>title: Trả về tiêu đề của trang hiện tại. vd: document.title;</li>
                <li>scripts: Trả về một mảng đối tượng chứa các thẻ script trong trang. vd: document.scripts.length;</li>
                <li>readyState: Trả về trạng thái của trang. Bao gồm 4 trạng thái sau: uninitialized,loading,loaded,interactive,complete</li>
                <li>images: Trả về một mảng đối tượng chứa các thẻ img trong trang. vd: document.images.length;</li>
            </ul>
        </div>
    </div>
</body>

</html>
