@extends('frontend.layout.layout')
@section('content')
    <!-- chi tiet san pham -->

    <section class="py-5">
        <div class="container border-show py-3">
            <div class=" row">
                <div class="col-lg-5 col-md-6 mt-3">
                    <img class="img-fluid img_parent" src="{{ $product->Image()->value('img_file_path') }}" alt="loading">
                    <div class="d-flex justify-content-between w-100 mt-3">
                        @foreach ($product->Image as $img)
                            <img class="imgThum" src="{{ $img->img_file_path }}" alt="" class="change_thumb">
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-3">
                    <div class="px-3 product-info">
                        @include('frontend.product.info')
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 mt-3 ">
                    <div class="guarantee__top">
                        <i class="fas fa-shield-alt"></i>
                        <span>SỐ 1 BẢO HÀNH, HẬU MÃI TẠI VIỆT NAM</span>
                    </div>
                    <div class="guarantee__bot">
                        <div class="guarantee__items">
                            <a href="https://baohiem.xwatch.vn/" alt="Bảo hiểm cả lỗi người dùng trong 5 năm"><svg
                                    viewBox="-28 1 511 511.999">
                                    <path
                                        d="m403.164062 85.199219c-15.847656-2.003907-31.335937-5.519531-46.027343-10.445313-3.929688-1.316406-8.179688.800782-9.496094 4.726563-1.316406 3.929687.800781 8.179687 4.726563 9.496093 15.628906 5.242188 32.085937 8.976563 48.917968 11.105469 25.242188 3.195313 43.257813 26.492188 40.15625 51.929688-4.066406 33.359375-11.511718 83.152343-23.886718 130.917969-13.480469 52.027343-29.300782 88.226562-47.023438 107.59375-36.394531 39.769531-82.023438 75.019531-113.890625 97.585937-16.746094 11.859375-39.246094 11.859375-55.988281 0-31.867188-22.566406-77.496094-57.816406-113.890625-97.585937-17.722657-19.367188-33.546875-55.566407-47.023438-107.59375-12.375-47.765626-19.820312-97.558594-23.890625-130.917969-3.097656-25.4375 14.914063-48.734375 40.160156-51.929688 72.769532-9.203125 121-45.765625 148.648438-74.816406 6.300781-6.617187 14.820312-10.265625 23.988281-10.265625s17.6875 3.648438 23.992188 10.265625c19.917969 20.929687 42.941406 37.996094 68.429687 50.726563 3.703125 1.851562 8.210938.347656 10.0625-3.359376 1.847656-3.707031.34375-8.210937-3.359375-10.058593-23.929687-11.953125-45.550781-27.984375-64.269531-47.648438-9.160156-9.625-21.539062-14.925781-34.855469-14.925781-13.316406 0-25.695312 5.300781-34.855469 14.925781-25.96875 27.285157-71.277343 61.625-139.664062 70.273438-33.414062 4.226562-57.265625 35.015625-53.167969 68.628906 6.984375 57.289063 28.25 196.023437 74.738281 246.824219 37.289063 40.746094 83.820313 76.707031 116.285157 99.699218 10.964843 7.765626 23.8125 11.648438 36.664062 11.648438 12.847657-.003906 25.699219-3.882812 36.664063-11.648438 32.464844-22.992187 78.996094-58.953124 116.285156-99.699218 46.492188-50.800782 67.753906-189.535156 74.738281-246.824219 4.097657-33.613281-19.753906-64.402344-53.167969-68.628906zm0 0">
                                    </path>
                                    <path
                                        d="m211.722656 70.453125c-37.941406 32.832031-82.234375 54.320313-131.644531 63.867187-15.054687 2.910157-25.21875 17.144532-23.140625 32.410157 3.496094 25.667969 10.644531 73.671875 19.21875 106.765625 15.628906 60.335937 30.742188 83.308594 38.359375 91.628906 25.039063 27.359375 71.5 63.917969 96.964844 83.273438 5.054687 3.839843 11.109375 5.757812 17.164062 5.757812 6.054688 0 12.109375-1.917969 17.164063-5.757812 25.464844-19.355469 71.925781-55.914063 96.964844-83.273438 7.617187-8.320312 22.730468-31.292969 38.359374-91.628906 8.578126-33.101563 15.722657-81.101563 19.222657-106.765625 2.078125-15.265625-8.089844-29.5-23.144531-32.410157-49.410157-9.546874-93.703126-31.035156-131.644532-63.867187-9.648437-8.347656-24.195312-8.347656-33.84375 0zm173.769532 94.25c-3.453126 25.339844-10.496094 72.675781-18.878907 105.03125-15.800781 60.992187-30.710937 80.679687-34.902343 85.265625-25.152344 27.480469-74.800782 66.117188-94.980469 81.453125-4.761719 3.621094-11.410157 3.621094-16.171875 0-20.179688-15.335937-69.828125-53.976563-94.976563-81.453125-4.195312-4.585938-19.105469-24.273438-34.90625-85.265625-8.378906-32.347656-15.421875-79.6875-18.875-105.03125-1.007812-7.378906 3.878907-14.253906 11.121094-15.65625 52.027344-10.050781 98.664063-32.675781 138.617187-67.25 2.023438-1.753906 4.566407-2.632813 7.105469-2.632813 2.539063 0 5.082031.878907 7.105469 2.632813 39.953125 34.574219 86.589844 57.199219 138.617188 67.25 7.242187 1.402344 12.128906 8.277344 11.125 15.65625zm0 0">
                                    </path>
                                    <path
                                        d="m187.050781 234.066406c-5.640625-4.59375-24.679687-14.078125-38.3125 3.933594-13.628906 18.007812-1.707031 33.71875 3.933594 38.3125l21.75 17.695312c3.210937 2.613282 7.9375 2.132813 10.550781-1.082031 2.613282-3.214843 2.128906-7.9375-1.082031-10.554687l-21.75-17.695313c-2.53125-2.0625-8.0625-8.777343-1.765625-17.210937 6.296875-8.429688 14.675781-3.828125 17.207031-1.765625l45.035157 36.644531c2.972656 2.417969 7.289062 2.207031 10.011718-.492188l65.902344-65.285156c4.792969-4.75 12.550781-4.710937 17.300781.082032 4.746094 4.789062 4.707031 12.550781-.082031 17.296874l-78.496094 77.765626c-6.214844 5.992187-13.058594 3.496093-16.328125.796874l-12.460937-10.136718c-3.214844-2.613282-7.9375-2.128906-10.554688 1.082031-2.613281 3.210937-2.128906 7.9375 1.085938 10.550781l12.460937 10.140625c4.839844 3.9375 10.941407 6.109375 17.183594 6.109375 7.230469 0 14.039063-2.800781 19.171875-7.886718l78.492188-77.761719c10.667968-10.570313 10.75-27.847657.179687-38.515625-10.566406-10.664063-27.84375-10.746094-38.511719-.179688l-61.117187 60.546875zm0 0">
                                    </path>
                                </svg></a>
                            <a class="title" href="">Bảo hiểm cả lỗi người dùng trong 5 năm</a>
                        </div>
                        <div class="guarantee__items">
                            <a href="" alt="1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất"><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    version="1.1" x="0px" y="0px" viewBox="0 0 512.422 512.422"
                                    style="enable-background:new 0 0 512.422 512.422;" xml:space="preserve" width="37px"
                                    height="37px">
                                    <g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M41.053,223.464c2.667,1.067,5.76,1.067,8.427-0.213l83.307-37.867c5.333-2.56,7.573-8.96,5.013-14.293 c-2.453-5.12-8.533-7.467-13.76-5.12l-58.347,26.56c27.84-83.307,105.387-138.987,194.667-138.987 c93.547,0,175.36,62.507,198.933,152c1.493,5.653,7.36,9.067,13.013,7.573c5.653-1.493,9.067-7.36,7.573-13.013 c-26.027-98.773-116.267-167.893-219.52-167.893c-98.453,0-184.107,61.44-215.04,153.387l-24.533-61.333 c-1.813-5.547-7.893-8.64-13.44-6.827c-5.547,1.813-8.64,7.893-6.827,13.44c0.107,0.427,0.32,0.853,0.533,1.28l34.027,85.333 C36.146,220.158,38.279,222.398,41.053,223.464z">
                                                </path>
                                                <path
                                                    d="M511.773,380.904c-0.107-0.213-0.213-0.427-0.213-0.64l-34.027-85.333c-1.067-2.667-3.2-4.907-5.973-5.973 c-2.667-1.067-5.76-0.96-8.427,0.213l-83.307,37.867c-5.44,2.24-8,8.533-5.76,13.973c2.24,5.44,8.533,8,13.973,5.76 c0.213-0.107,0.427-0.213,0.64-0.32l58.347-26.56c-28.053,83.307-105.707,138.987-194.88,138.987 c-93.547,0-175.36-62.507-198.933-152c-1.493-5.653-7.36-9.067-13.013-7.573c-5.653,1.493-9.067,7.36-7.573,13.013 c25.92,98.88,116.267,167.893,219.52,167.893c98.453,0,184-61.44,215.04-153.387l24.533,61.333 c2.027,5.547,8.107,8.427,13.653,6.4C510.919,392.531,513.799,386.451,511.773,380.904z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg></a>
                            <a class="title" href="">1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất</a>
                        </div>
                        <div class="guarantee__items">
                            <a href="" alt="Đền gấp 10 lần  nếu phát hiện fake"><svg x="0px" y="0px" viewBox="0 0 470 470"
                                    style="enable-background:new 0 0 470 470;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M252.5,223h-34.9c-14.5,0-26.3-11.8-26.3-26.3s11.8-26.3,26.3-26.3h61.6c6.6,0,12-5.4,12-12s-5.4-12-12-12h-32.1v-24.5    c0-6.6-5.4-12-12-12s-12,5.4-12,12v24.5h-5.5c-27.7,0-50.3,22.6-50.3,50.3s22.6,50.3,50.3,50.3h34.9c14.5,0,26.3,11.8,26.3,26.3    s-11.8,26.3-26.3,26.3h-62.7c-6.6,0-12,5.4-12,12s5.4,12,12,12H223v25c0,6.6,5.4,12,12,12s12-5.4,12-12v-25h5.8c0.1,0,0.2,0,0.3,0    c27.4-0.4,49.6-22.8,49.6-50.3C302.7,245.5,280.2,223,252.5,223z">
                                            </path>
                                            <path
                                                d="M401.2,68.8C356.8,24.4,297.8,0,235,0S113.2,24.4,68.8,68.8S0,172.2,0,235s24.4,121.8,68.8,166.2S172.2,470,235,470    s121.8-24.4,166.2-68.8S470,297.8,470,235S445.6,113.2,401.2,68.8z M235,446c-116.3,0-211-94.7-211-211S118.7,24,235,24    s211,94.7,211,211S351.3,446,235,446z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a class="title" href="">Đền gấp 10 lần nếu phát hiện fake</a>
                        </div>
                        <div class="guarantee__items">
                            <a href="" alt="Free ship toàn quốc thanh toán khi nhận hàng"><svg x="0px" y="0px"
                                    viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M476.158,286.938l-13.259-53.035c3.625-0.77,6.345-3.986,6.345-7.839v-8.551c0-18.566-15.105-33.67-33.67-33.67h-60.392    v-17.637c0-9.136-7.432-16.568-16.568-16.568H246.32l68.24-27.296c4.111-1.644,6.11-6.31,4.466-10.421    c-1.644-4.11-6.307-6.111-10.421-4.466l-55.874,22.349c17.026-10.924,33.871-22.947,40.284-31.355    c12.485-16.369,9.323-39.843-7.046-52.328c-16.369-12.486-39.843-9.323-52.328,7.046c-9.122,11.962-21.158,45.573-28.948,69.258    c-7.79-23.683-19.826-57.296-28.948-69.258c-12.484-16.369-35.959-19.53-52.328-7.046c-16.369,12.484-19.53,35.958-7.046,52.328    c6.413,8.409,23.257,20.431,40.284,31.355l-55.874-22.349c-4.113-1.647-8.777,0.355-10.421,4.466    c-1.645,4.111,0.355,8.777,4.466,10.421l68.24,27.296H50.772c-9.136,0-16.568,7.432-16.568,16.568v145.37    c0,4.427,3.589,8.017,8.017,8.017c4.427,0,8.017-3.589,8.017-8.017v-145.37c0-0.295,0.239-0.534,0.534-0.534h307.841    c0.295,0,0.534,0.239,0.534,0.534v145.372c0,4.427,3.589,8.017,8.017,8.017c4.427,0,8.017-3.589,8.017-8.017v-9.088h94.566    c0.009,0,0.016,0.002,0.025,0.002s0.017-0.001,0.026-0.001c11.636,0.009,21.516,7.647,24.908,18.171h-24.928    c-4.427,0-8.017,3.589-8.017,8.017v17.102c0,13.851,11.268,25.119,25.119,25.119h9.086v35.273h-20.962    c-6.886-19.882-25.787-34.205-47.982-34.205s-41.097,14.322-47.982,34.205h-3.86V345.78c0-4.427-3.589-8.017-8.017-8.017    c-4.427,0-8.017,3.589-8.017,8.017v60.392H192.817c-6.886-19.882-25.787-34.205-47.982-34.205s-41.097,14.322-47.982,34.205    H50.772c-0.295,0-0.534-0.239-0.534-0.534v-17.637h34.739c4.427,0,8.017-3.589,8.017-8.017s-3.589-8.017-8.017-8.017H8.017    c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017h26.188v17.637c0,9.136,7.432,16.568,16.568,16.568h43.304    c-0.002,0.178-0.014,0.355-0.014,0.534c0,27.995,22.777,50.772,50.772,50.772s50.772-22.777,50.772-50.772    c0-0.18-0.012-0.356-0.014-0.534h180.67c-0.002,0.178-0.014,0.355-0.014,0.534c0,27.995,22.777,50.772,50.772,50.772    c27.995,0,50.772-22.777,50.772-50.772c0-0.18-0.012-0.356-0.014-0.534h26.203c4.427,0,8.017-3.589,8.017-8.017v-85.511    C512,307.564,496.423,290.022,476.158,286.938z M172.9,121.059c-31.623-19.651-41.003-28.692-43.78-32.334    c-7.123-9.339-5.319-22.732,4.021-29.855c3.85-2.936,8.388-4.355,12.893-4.355c6.422,0,12.776,2.886,16.963,8.376    c7.755,10.168,19.9,44.391,27.918,69.052C185.504,128.757,179.284,125.028,172.9,121.059z M218.473,131.942    c8.018-24.66,20.163-58.882,27.917-69.052c7.123-9.339,20.516-11.142,29.855-4.02c9.34,7.123,11.143,20.516,4.021,29.855    c-2.777,3.641-12.157,12.683-43.778,32.333C230.105,125.026,223.885,128.756,218.473,131.942z M375.182,199.875h60.392    c9.725,0,17.637,7.912,17.637,17.637v0.534h-78.029V199.875z M375.182,286.456V234.08h71.235l13.094,52.376H375.182z     M144.835,457.479c-19.155,0-34.739-15.584-34.739-34.739s15.584-34.739,34.739-34.739c19.155,0,34.739,15.584,34.739,34.739    S163.99,457.479,144.835,457.479z M427.023,457.479c-19.155,0-34.739-15.584-34.739-34.739s15.584-34.739,34.739-34.739    c19.155,0,34.739,15.584,34.739,34.739S446.178,457.479,427.023,457.479z M495.967,354.865h-9.086    c-5.01,0-9.086-4.076-9.086-9.086v-9.086h18.171V354.865z">
                                            </path>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M144.835,406.172c-9.136,0-16.568,7.432-16.568,16.568s7.432,16.568,16.568,16.568c9.136,0,16.568-7.432,16.568-16.568    S153.971,406.172,144.835,406.172z">
                                            </path>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M427.023,406.172c-9.136,0-16.568,7.432-16.568,16.568s7.432,16.568,16.568,16.568c9.136,0,16.568-7.432,16.568-16.568    S436.159,406.172,427.023,406.172z">
                                            </path>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M332.96,371.967H213.244c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017H332.96    c4.427,0,8.017-3.589,8.017-8.017S337.388,371.967,332.96,371.967z">
                                            </path>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M127.733,337.763H25.119c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017h102.614    c4.427,0,8.017-3.589,8.017-8.017S132.16,337.763,127.733,337.763z">
                                            </path>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M127.733,218.046H93.528c-4.427,0-8.017,3.589-8.017,8.017v68.409c0,4.427,3.589,8.017,8.017,8.017    s8.017-3.589,8.017-8.017v-26.188h17.637c4.427,0,8.017-3.589,8.017-8.017s-3.589-8.017-8.017-8.017h-17.637V234.08h26.188    c4.427,0,8.017-3.589,8.017-8.017C135.749,221.636,132.16,218.046,127.733,218.046z">
                                            </path>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M190.822,272.043c8.023-5.255,13.337-14.317,13.337-24.602c0-16.209-13.186-29.395-29.395-29.395h-21.378    c-4.427,0-8.017,3.589-8.017,8.017v68.409c0,4.427,3.589,8.017,8.017,8.017s8.017-3.589,8.017-8.017v-17.637h13.346l14.722,22.083    c1.545,2.317,4.086,3.571,6.677,3.571c1.529,0,3.073-0.436,4.439-1.348c3.685-2.455,4.68-7.433,2.223-11.116L190.822,272.043z     M174.764,260.802h-13.361V234.08h13.361c7.368,0,13.361,5.993,13.361,13.361C188.125,254.809,182.132,260.802,174.764,260.802z">
                                            </path>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M256,286.456h-26.188v-18.198c0.177,0.012,0.354,0.027,0.534,0.027h17.102c4.427,0,8.017-3.589,8.017-8.017    s-3.589-8.017-8.017-8.017h-17.102c-0.181,0-0.357,0.015-0.534,0.027V234.08H256c4.427,0,8.017-3.589,8.017-8.017    c0-4.427-3.589-8.017-8.017-8.017h-34.205c-4.427,0-8.017,3.589-8.017,8.017v68.409c0,4.427,3.589,8.017,8.017,8.017H256    c4.427,0,8.017-3.589,8.017-8.017S260.427,286.456,256,286.456z">
                                            </path>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M315.858,286.456H289.67v-18.171h9.086c4.427,0,8.017-3.589,8.017-8.017s-3.589-8.017-8.017-8.017h-9.086V234.08h26.188    c4.427,0,8.017-3.589,8.017-8.017c0-4.427-3.589-8.017-8.017-8.017h-34.205c-4.427,0-8.017,3.589-8.017,8.017v68.409    c0,4.427,3.589,8.017,8.017,8.017h34.205c4.427,0,8.017-3.589,8.017-8.017S320.285,286.456,315.858,286.456z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a class="title" href="">Free ship toàn quốc thanh toán khi nhận hàng</a>
                        </div>
                        <div class="guarantee__items--bot">
                            <a href="" alt="hotline" class="me-3">19000325</a>
                            <a href="" alt="">cskh.xwatch@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  py-3  mt-5 border-top border-2">
                <div class="col-lg-9 col-md-12">
                    <div class="product-desc">
                        <p>Mô Tả Sản Phẩm</p>
                        <div class="length">{!! $product->pro_desc !!}</div>
                    </div>
                    <div class="text-center py-3 leg">
                        <p class="btn btn-primary read_more">Xem Thêm</p>
                        <p class="btn btn-primary hide-more d-none">Thu gọn</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="info__top">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Thông Tin Sản Phẩm</span>
                    </div>
                    <div class="info__bot">
                        <table>
                            <tr>
                                <td class="left"> <span>Thương Hiệu:</span> </td>
                                <td class="right"><span>{{ $product->Trademark->tr_name }}</span></td>
                            </tr>
                            <tr>
                                <td class="left"><span>Nguồn Gốc:</span></td>
                                <td class="right"><span>{{ $product->pro_source }}</span></td>
                            </tr>
                            <tr>
                                <td class="left"> <span>Kiểu Máy:</span></td>
                                <td class="right"><span>{{ $product->pro_machine_type }}</span></td>
                            </tr>
                            <tr>
                                <td class="left"><span>Kích Cỡ (mm) :</span></td>
                                <td class="right"><span>{{ $product->pro_size }}</span></td>
                            </tr>
                            <tr>
                                <td class="left"><span>Độ Dày (mm):</span></td>
                                <td class="right"><span>{{ $product->pro_thickness }}</span></td>
                            </tr>
                            <tr>
                                <td class="left"> <span>Chất Liệu Vỏ:</span></td>
                                <td class="right"><span>{{ $product->pro_shell_material }}</span></td>
                            </tr>
                            <tr>
                                <td class="left"><span>Chất Liệu Dây:</span></td>
                                <td class="right"><span>{{ $product->pro_rope_material }}</span></td>
                            </tr>
                            <tr>
                                <td class="left"><span>Chất Liệu Kính:</span></td>
                                <td class="right"><span>{{ $product->pro_glass_material }}</span></td>
                            </tr>
                            <tr>
                                <td class="left"><span>Độ Chịu Nước (m):</span></td>
                                <td class="right"><span>{{ $product->pro_waterproof }}</span></td>
                            </tr>
                            <tr>
                                <td class="left"><span>Chức Năng :</span></td>
                                <td class="right"><span>{{ $product->pro_function }}</span></td>
                            </tr>
                            <tr>
                                <td class="left"><span>Bảo Hành:</span></td>
                                <td class="right"><span>{{ $product->pro_guarantee }}</span></td>
                            </tr>
                            <tr>
                                <td class="left"><span>Giới Tính:</span></td>
                                <td class="right"><span>{{ $product->pro_gender }}</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container border-show py-4">
            <div class=" row ">
                <div class="col-lg-12 col-md-12 ">
                    <div class="rating">
                        @include('frontend.product.rate')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container border-show py-4">
            <div class=" row ">
                <div class="col-lg-12 col-md-12 ">
                    <div class="d-flex mb-3 justify-content-between px-3">
                        <span class="fw-bold fs-5">{{ count($product->Comment) }} Bình luận</span>
                        <div class="f-flex">
                            <span class="fw-bold fs-5">Sắp xếp theo:</span>
                            <select name="" id="" class="pe-3">
                                <option value="">Mới Nhất</option>
                                <option value="">Cũ Nhất</option>
                            </select>
                        </div>
                    </div>
                    <div class="comment">
                        @include('frontend.product.comment')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ennd chi tiet san pham  -->

    <!-- kien thuc dong ho -->
    <section class="py-5">
        <div class="container border-show py-3">
            <div class=" row">
                <div class="col-lg-12 col-md-12">
                    <div class="news__title">
                        <span>XWATCH - TIN TỨC VÀ SỰ KIỆN</span>
                    </div>
                </div>
            </div>
            <div class="row list-new">
                <div class="col-lg-3 col-md-4">
                    <div class="news__item">
                        <a href="#"><img src="/image/default/tin1.jpg" alt="#"></a>
                        <a href="#">TẤT TẦN TẬT VỀ ĐỒNG HỒ SEIKO 5: HUYỂN THOẠI VỀ...</a>
                        <p> <i class="far fa-calendar-alt me-2"></i>19/04/2021</p>
                        <span>Cùng với Orient SK Mặt Lửa, Casio F91, Poljot, Rado Silver Star, hai đại diện danh giá đến từ
                            thương ... </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="news__item">
                        <a href="#"><img src="/image/default/tin2.png" alt="#"></a>
                        <a href="#">OGIVAL TRÂU VÀNG PHÚ QUÝ - BÁU VẬT PHONG THỦY...</a>
                        <p> <i class="far fa-calendar-alt  me-2"></i>04/02/2021</p>
                        <span>Năm Tân Sửu sở hữu Ngưu Vàng là chuẩn nhất, đặc biệt là các bác tuổi Sửu lại càng tuyệt vời
                            hơn.
                            ... </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="news__item">
                        <a href="#"><img src="/image/default/tin3.jpg" alt="#"></a>
                        <a href="#">[NEW] SRWATCH GALAXY “LIMITED”: NGỠ TƯỞNG SIÊU ...</a>
                        <p> <i class="far fa-calendar-alt  me-2"></i>02/02/2021</p>
                        <span>Nếu nhìn thoáng qua, rất nhiều anh em sẽ lầm tưởng đẩy là siêu phẩm đình đám đến từ Thụy Sĩ -
                            HUBLOT ... </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="news__item">
                        <a href="#"><img src="/image/default/tin3.jpg" alt="#"></a>
                        <a href="#">[NEW] SRWATCH GALAXY “LIMITED”: NGỠ TƯỞNG SIÊU ...</a>
                        <p> <i class="far fa-calendar-alt  me-2"></i>02/02/2021</p>
                        <span>Nếu nhìn thoáng qua, rất nhiều anh em sẽ lầm tưởng đẩy là siêu phẩm đình đám đến từ Thụy Sĩ -
                            HUBLOT ... </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end kien thuc dong ho -->


@endsection
