<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin 1',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111111'),
                'level'  => '2' ,
                
            ],
            [
                'name' => 'Admin 2',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('111111'),
                'level'  => '1' ,
                
            ],
            [
                'name' => 'Admin 3',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('111111'),
                'level'  => '1' ,
                
            ],
            [
                'name' => 'Admin 4',
                'email' => 'admin3@gmail.com',
                'password' => Hash::make('111111'),
                'level'  => '1' ,
                
            ],
            [
                'name' => 'Admin 5',
                'email' => 'admin4@gmail.com',
                'password' => Hash::make('111111'),
                'level'  => '2' ,
                
            ],
            [
                'name' => 'Admin 6',
                'email' => 'admin5@gmail.com',
                'password' => Hash::make('111111'),
                'level'  => '2' ,
                
            ],
            [
                'name' => 'User 1',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('111111'),
                'level'  => '0' ,
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('111111'),
                'level'  => '0' ,
            ],
            [
                'name' => 'User 3',
                'email' => 'user3@gmail.com',
                'password' => Hash::make('111111'),
                'level'  => '0' ,
            ],
            [
                'name' => 'User 4',
                'email' => 'user4@gmail.com',
                'password' => Hash::make('111111'),
                'level'  => '0' ,
            ],
            [
                'name' => 'User 5',
                'email' => 'user5@gmail.com',
                'password' => Hash::make('111111'),
                'level'  => '0' ,
            ],
            [
                'name' => 'User 6',
                'email' => 'user6@gmail.com',
                'password' => Hash::make('111111'),
                'level'  => '0' ,
            ],
            [
                'name' => 'User 7',
                'email' => 'user7@gmail.com',
                'password' => Hash::make('111111'),
                'level'  => '0' ,
            ],
        ]);   
        
        DB::table('categories')->insert([
            [
                'c_name' => 'Đồng Hồ Nam',
                'c_slug' => 'dong-ho-nam',
                'c_desc' =>'<p>C&ugrave;ng kh&aacute;m ph&aacute; những mẫu đồng hồ nam đẹp nhất từ c&aacute;c thương hiệu đồng hồ nam gi&aacute; rẻ như Orient, Seiko, Citizen, Ogival, OP, Bentley, Festina, Freelook, Bulova, Srwatch.. đến c&aacute;c h&atilde;ng đồng hồ nam cao cấp Thụy Sĩ như Ogival, Elixa, Michael Kors... được&nbsp;<strong>Xwatch</strong>&nbsp;ph&acirc;n phối để lựa chọn tri kỷ thời gian v&agrave; khẳng định phong c&aacute;ch thời trang của ri&ecirc;ng m&igrave;nh.</p>

                <p>Duy nhất khi mua đồng hồ nam tại shop đồng hồ Xwatch, bạn sẽ được hưởng chế độ bảo hiểm đồng hồ 5 năm&nbsp;<strong>CẢ LỖI NGƯỜI D&Ugrave;NG</strong>&nbsp;c&ugrave;ng cam kết 100%&nbsp;<strong>ĐỒNG HỒ CH&Iacute;NH H&Atilde;NG</strong>&nbsp;- Đền gấp 10 lần nếu ph&aacute;t hiện&nbsp;<em>đồng hồ Fake</em>.</p>',
                'c_status'  => '1' ,
                'created_at' => '2021-07-07 16:05:32'
                
            ],
            [
                'c_name' => 'Đồng Hồ Nữ',
                'c_slug' => 'dong-ho-nu',
                'c_desc' =>'<p>Sở hữu thiết kế sang trọng, chất liệu cao cấp, cỗ m&aacute;y bền bỉ, đồng hồ nữ&nbsp;kh&ocirc;ng chỉ l&agrave; một phụ kiện xem giờ m&agrave; c&ograve;n trở th&agrave;nh biểu tượng tạo dựng n&ecirc;n phong c&aacute;ch ri&ecirc;ng của chủ sở hữu. C&ugrave;ng kh&aacute;m ph&aacute; những mẫu&nbsp;<a href="https://xwatch.vn/dong-ho-pc754.html">đồng hồ</a>&nbsp;đeo tay thời trang&nbsp;đẹp nhất d&agrave;nh cho ph&aacute;i nữ&nbsp;đến từ c&aacute;c thương hiệu nổi tiếng của Nhật Bản, Thụy Sĩ, Hoa Kỳ, T&acirc;y Ban Nha, Đức, Ph&aacute;p&nbsp;được ph&acirc;n phối tại Xwatch để t&igrave;m kiếm tri kỷ thời gian v&agrave; khẳng định phong c&aacute;ch của ri&ecirc;ng m&igrave;nh.</p>

                <p>Kh&aacute;m ph&aacute;m 1000+ mẫu&nbsp;đồng hồ nữ ch&iacute;nh h&atilde;ng&nbsp;thiết kế tinh tế v&agrave; thanh lịch nhất năm 2021. Mua&nbsp;đồng hồ nữ đẹp ch&iacute;nh h&atilde;ng&nbsp;tại&nbsp;<a href="https://xwatch.vn/">Xwatch</a>&nbsp;được bảo hiểm 5 năm cả lỗi người d&ugrave;ng</p>',
                'c_status'  => '0' ,
                'created_at' => '2021-07-07 16:07:11'
                
            ],
            [
                'c_name' => 'Đồng Hồ Cặp Đôi',
                'c_slug' => 'dong-ho-cap-doi',
                'c_desc' =>'<p><strong><a href="https://xwatch.vn/dong-ho-doi-pc756.html">Đồng hồ cặp đ&ocirc;i</a></strong>&nbsp;l&agrave; m&oacute;n qu&agrave; d&agrave;nh ri&ecirc;ng cho c&aacute;c đ&ocirc;i t&igrave;nh nh&acirc;n đang hẹn h&ograve; hay tiến tới h&ocirc;n nh&acirc;n với nhau. Tặng&nbsp;<strong>đồng hồ đ&ocirc;i</strong>&nbsp;cho anh ấy/c&ocirc; ấy kh&ocirc;ng chỉ thể hiện sự quan t&acirc;m của m&igrave;nh đối với người ấy m&agrave; c&ograve;n l&agrave; một kỷ vật t&igrave;nh y&ecirc;u v&ocirc; c&ugrave;ng l&atilde;ng mạn. Thời gian l&agrave; v&ocirc; gi&aacute;, t&igrave;nh y&ecirc;u l&agrave; điều thi&ecirc;ng li&ecirc;ng nhất. H&atilde;y lựa chọn những mẫu đồng hồ couple thiết kế đẹp nhất, thời trang nhất với gi&aacute; tốt nhất tại&nbsp;<strong><a href="https://xwatch.vn/">Xwatch</a></strong>&nbsp;để tạo n&ecirc;n sự gần gủi v&agrave; gắn kết t&igrave;nh y&ecirc;u lứa đ&ocirc;i...</p>',
                'c_status'  => '1' ,
                'created_at' => '2021-07-09 10:05:32'
                
            ],
            [
                'c_name' => 'Đồng Hồ Trẻ Em',
                'c_slug' => 'dong-ho-tre-em',
                'c_desc' =>'<p>Với mục đ&iacute;ch vừa l&agrave;m m&oacute;n phụ kiện dễ thương cho trẻ vừa l&agrave; thiết bị gi&uacute;p phụ huynh theo d&otilde;i con của m&igrave;nh, đồng hồ định vị GPS&nbsp;<strong>TioKid</strong>&nbsp;c&oacute; chất liệu ch&iacute;nh l&agrave; nhựa cao cấp, cho cảm gi&aacute;c mang tr&ecirc;n tay mềm mại, c&oacute; độ đ&agrave;n hồi v&agrave; kh&ocirc;ng l&agrave;m kh&oacute; chịu cho da tay.</p>',
                'c_status'  => '1' ,
                'created_at' => '2021-07-08 20:15:06'
                
            ],
            [
                'c_name' => 'Phụ Kiện',
                'c_slug' => 'phu-kien',
                'c_desc' =>'<p>PHỤ KIỆN ĐỒNG HỒ CH&Iacute;NH H&Atilde;NG: D&acirc;y da, hộp xoay, hộp da đựng đồng hồ ĐẸP - BỀN - CHẤT.</p>

                <p>✔️ D&acirc;y đeo đồng hồ đa dạng chất liệu: D&acirc;y da b&ograve;, d&acirc;y da c&aacute; sấu, d&acirc;y đ&agrave; điểu với đường bo viền chắc chắn, đường may đều mang lại vẻ đẹp thẩm mĩ v&agrave; sức bền cho d&acirc;y đeo.</p>
                
                <p>✔️ Hộp da đựng đồng hồ cầm tay 2 ngăn với 2 m&agrave;u sang trọng: Đen v&agrave; N&acirc;u - Tiện lợi khi mang theo du lịch.</p>
                
                <p>✔️&nbsp;Hộp xoay đồng hồ với chất liệu vỏ l&agrave; gỗ sơn m&agrave;i b&oacute;ng c&ugrave;ng nội thất bọc da PU m&agrave;u sữa sang trọng, mềm mại tạo n&ecirc;n vẻ đẹp trang nh&atilde; v&agrave; thanh lịch.</p>
                
                <p>H&atilde;y t&acirc;n trang v&agrave; chăm s&oacute;c cỗ m&aacute;y thời gian của m&igrave;nh bằng những phụ kiện đồng hồ ch&iacute;nh h&atilde;ng, bền đẹp nh&eacute;!</p>
                
                <p>➡️➡️➡️ ĐẶC BIỆT, Xwatch đang SALE UP TO 30% - Sở hữu ngay th&ocirc;i n&agrave;o!</p>',
                'c_status'  => '1' ,
                'created_at' => '2021-07-10 08:25:47'
                
            ],
            [
                'c_name' => 'Vòng Tay Thông Minh',
                'c_slug' => 'vong-tay-thong-minh',
                'c_desc' =>'<h2><strong>Tại sao bạn n&ecirc;n cần sở hữu 1 chiếc v&ograve;ng đeo tay&nbsp;th&ocirc;ng minh</strong></h2>

                <p>Thời đại c&ocirc;ng nghệ ng&agrave;y nay thật sự l&agrave; một điều đặc biệt v&agrave; v&ocirc; c&ugrave;ng lợi &iacute;ch đối với ch&uacute;ng ta. V&igrave; thế, việc sở hữu 1 chiếc đồng hồ&nbsp;th&ocirc;ng minh sẽ rất tiện lợi về nhiều mặt:</p>
                
                <h3>Chức năng hiển thị thời gian</h3>
                
                <p>Chiếc v&ograve;ng đeo tay th&ocirc;ng minh sẽ c&oacute; chế độ hiển thị thời gian: giờ giấc, ng&agrave;y th&aacute;ng ch&iacute;nh x&aacute;c cho người sử dụng nắm r&otilde;. Từ đ&oacute; mọi hoạt động trong cuộc sống đều được bạn nắm r&otilde; r&agrave;ng với giờ giấc ch&iacute;nh x&aacute;c.</p>
                
                <h3>Chức năng đo nhịp tim</h3>
                
                <p>Chiếc v&ograve;ng đeo tay th&ocirc;ng minh c&ograve;n c&oacute; chức năng đo nhịp tim một c&aacute;ch ch&iacute;nh x&aacute;c, phản &aacute;nh tuần ho&agrave;n của m&aacute;u v&agrave; gi&uacute;p bạn nắm r&otilde; sức khỏe. Từ đ&oacute;, cải thiện sức khỏe nhờ tập luyện v&agrave; ăn uống.</p>
                
                <h3>Chức năng theo d&otilde;i di chuyển, vận động</h3>
                
                <p>Chiếc đồng hồ n&agrave;y sẽ nắm r&otilde; được bạn đ&atilde; đi bao nhi&ecirc;u bước ch&acirc;n trong l&uacute;c thể thao, vận động,... Từ đ&oacute;, n&oacute; sẽ cho bạn biết được lượng calo ti&ecirc;u hao l&agrave; bao nhi&ecirc;u v&agrave; gi&uacute;p bạn dễ d&agrave;ng biết c&aacute;ch b&ugrave; trừ lượng calo cho bản th&acirc;n</p>',
                'c_status'  => '0' ,
                'created_at' => '2021-07-08 07:05:32'
                
            ],
           
        ]); 

        DB::table('trademarks')->insert([
            [
                'tr_name' => 'Fossil',
                'tr_slug' => 'fossil',
                'tr_desc' =>'<p><span style="font-size:14px">&ldquo;Fossil được biết đến l&agrave; thương hiệu sản xuất quần &aacute;o v&agrave; phụ kiện thời trang lớn nhất tại Mỹ hiện nay. Mảng ch&iacute;nh của Fossil đ&oacute; l&agrave; sản xuất c&aacute;c loại đồng hồ hiệu với mẫu m&atilde; đa dạng v&agrave; thời trang. Phong c&aacute;ch đồng hồ Fossil ch&iacute;nh h&atilde;ng l&agrave; sự tiếp thu từ truyền thống cổ điển kết hợp với c&ocirc;ng nghệ hiện đại ng&agrave;y nay. Nếu như đồng hồ Fossil nam thu h&uacute;t kh&aacute;ch h&agrave;ng với sự tinh tế v&agrave; nổi bật từ những mẫu đồng hồ d&acirc;y da sang trọng. Th&igrave; đồng hồ Fossil nữ lại quyến rủ với những mẫu đồng hồ bằng kim loại mạ v&agrave;ng đầy qu&yacute; ph&aacute;i&hellip;.&rdquo;</span></p>',
                'tr_logo'  => '/image/Image_Thuonghieu/5000603388812_16.png' ,
                'created_at' => '2021-07-12 16:14:10'
            ],
            [
                'tr_name' => 'Kenneth Cole',
                'tr_slug' => 'kenneth-cole',
                'tr_desc' =>'<p>Sản phẩm của Kenneth Cole lu&ocirc;n&nbsp;<strong>đi liền với gi&aacute; trị thương hiệu, sự bền bỉ v&agrave; phong c&aacute;ch lịch l&atilde;m</strong>&nbsp;với những đường cắt, đường may ho&agrave;n hảo (c&aacute;c mẫu đồng hồ d&acirc;y da), được sản xuất dựa tr&ecirc;n<strong>&nbsp;ti&ecirc;u chuẩn nghi&ecirc;m ngặt của Nhật Bản.</strong></p>',
                'tr_logo'  => '/image/Image_Thuonghieu/4680642057225_17.png' ,
                'created_at' => '2021-07-12 16:16:24'
            ],
            [
                'tr_name' => 'Julius',
                'tr_slug' => 'julius',
                'tr_desc' =>'<p>◆&ndash; &ndash; &ndash; Được ra đời kh&aacute; muộn (năm 2001) tại đất nước &ldquo;oppa&rdquo; H&agrave;n Quốc, Julius nhanh ch&oacute;ng trở th&agrave;nh tr&agrave;o lưu&nbsp;<a href="https://donghohaitrieu.com/dong-ho-deo-tay-chinh-hang" rel="noopener noreferrer" target="_blank">đồng hồ đeo tay</a>&nbsp;nhờ gi&aacute; th&agrave;nh rẻ v&agrave; thiết kế thời trang.</p>

                <p>◆&ndash; &ndash; &ndash; Trải qua hơn 10 năm ph&aacute;t triển, Julius hiện đang c&oacute; mặt tại nhiều thị trường kh&aacute;c nhau v&agrave; một trong số đ&oacute; kh&ocirc;ng thể thiếu Việt Nam.</p>',
                'tr_logo'  => '/image/Image_Thuonghieu/3813300839070_18.png' ,
                'created_at' => '2021-07-12 16:16:41'
            ],
            [
                'tr_name' => 'Calvin Klein',
                'tr_slug' => 'calvin-klein',
                'tr_desc' =>'<p>Đồng hồ mang thương hiệu&nbsp;<strong>Calvin Klein&nbsp;</strong>kh&ocirc;ng phải l&agrave; một c&aacute;i t&ecirc;n mới lạ đối với những ai y&ecirc;u th&iacute;ch đồng hồ hiệu. Với thời gian xuất hiện v&agrave; tồn tại tr&ecirc;n thị trường hơn 20 năm, Calvin Klein lu&ocirc;n chứng minh được sức h&uacute;t của m&igrave;nh th&ocirc;ng qua những bộ sưu tập đồng hồ đơn giản nhưng lại thể hiện được s&aacute;ng tạo từ một thương hiệu nổi tiếng.</p>',
                'tr_logo'  => '/image/Image_Thuonghieu/6351164566116_19.png' ,
                'created_at' => '2021-07-12 16:17:14'
            ],
            [
                'tr_name' => 'Bulova',
                'tr_slug' => 'bulova',
                'tr_desc' =>'<p>Ra đời năm 1875, Bulova đ&atilde; trở th&agrave;nh một trong những thương hiệu đồng hồ được y&ecirc;u th&iacute;ch nhất v&agrave; trở th&agrave;nh tr&agrave;o lưu tại Hoa Kỳ. Được chế t&aacute;c theo ti&ecirc;u chuẩn khắt khe của Thụy Sĩ, c&ugrave;ng với c&ocirc;ng nghệ hiện đại v&agrave; vật liệu h&agrave;ng đầu, Bulova đem đến những chiếc&nbsp;<strong><a href="https://xwatch.vn/dong-ho-pc754.html">đồng hồ</a></strong>&nbsp;cực k&igrave; chất lượng m&agrave; bạn kh&ocirc;ng thể bỏ qua.</p>

                <p>Đồng hồ Bulova nam nữ ch&iacute;nh h&atilde;ng được nhập khẩu từ Mỹ. Mua&nbsp;<strong><a href="https://xwatch.vn/dong-ho-pc754/dong-ho-bulova.html">Đồng hồ Bulova ch&iacute;nh h&atilde;ng</a></strong>&nbsp;tại Xwatch bảo h&agrave;nh to&agrave;n cầu, bảo h&agrave;nh 5 năm cả lỗi người d&ugrave;ng.</p>',
                'tr_logo'  => '/image/Image_Thuonghieu/1210378598447_brand-bulova.png' ,
                'created_at' => '2021-07-12 16:20:19'
            ],
            [
                'tr_name' => 'Citizen',
                'tr_slug' => 'citizen',
                'tr_desc' =>'<p>Đồng hồ citizen&nbsp;l&agrave; thương hiệu đồng hồ đeo tay&nbsp;đang tranh gi&agrave;nh vị tr&iacute; thứ nhất Nhật Bản. H&atilde;ng lu&ocirc;n mang lại cho thế giới những thiết kế chuẩn mực, tinh tế v&agrave; đa dạng n&ecirc;n rất được ưa chuộng.</p>

                <p>Đến với Xwatch, bạn sẽ sở hữu được những mẫu đồng hồ&nbsp;citizen ch&iacute;nh h&atilde;ng Nhật Bản, đồng hồ Citizen Eco-Drive, đồng hồ Citizen Automatic, đồng hồ Citizen Quartz, đồng hồ citizen nam, đồng hồ citizen nữ&nbsp;ph&ugrave; hợp nhất với c&aacute; t&iacute;nh, c&ocirc;ng việc v&agrave; phong c&aacute;ch của m&igrave;nh.</p>
                
                <p>Đặc biệt, khi mua đồng hồ Citizen ch&iacute;nh h&atilde;ng&nbsp;tại Xwatch, ngo&agrave;i bảo h&agrave;nh từ h&atilde;ng, bạn c&ograve;n nhận được g&oacute;i &ldquo;Bảo hiểm CẢ LỖI NGƯỜI D&Ugrave;NG trong 5 năm - Đầu ti&ecirc;n tại Việt Nam&rdquo;.</p>',
                'tr_logo'  => '/image/Image_Thuonghieu/8086736274677_brand-citizen.png' ,
                'created_at' => '2021-07-12 16:21:18'
            ],
            [
                'tr_name' => 'Festina',
                'tr_slug' => 'festina',
                'tr_desc' =>'<p>Festina l&agrave; thương hiệu&nbsp;<strong><a href="https://xwatch.vn/dong-ho-pc754.html">đồng hồ</a></strong>&nbsp;T&acirc;y Ban Nha&nbsp;với hơn 100 năm lịch sử h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển. Giờ đ&acirc;y, Festina l&agrave; một trong c&aacute;c tập đo&agrave;n đồng hồ lớn nhất thế giới. Số lượng đồng hồ Festina b&aacute;n ra mỗi năm l&ecirc;n đến 5 triệu chiếc.&nbsp;<strong><a href="https://xwatch.vn/dong-ho-pc754/dong-ho-festina.html">Đồng hồ Festina</a></strong>&nbsp;g&acirc;y ấn tượng với kh&aacute;ch h&agrave;ng nhờ mẫu m&atilde; đa dạng, gi&aacute; cả phải chăng c&ugrave;ng sự pha trộn h&agrave;i h&ograve;a giữa m&agrave;u sắc cuồng nhiệt Mỹ Latinh với thiết kế sang trọng, tinh xảo của T&acirc;y Ban Nha.</p>',
                'tr_logo'  => '/image/Image_Thuonghieu/3424228992009_brand-festina.png' ,
                'created_at' => '2021-07-12 16:01:18'
            ],
            [
                'tr_name' => 'freelook',
                'tr_slug' => 'freelook',
                'tr_desc' =>'<p>Mang hơi thở của nền thời trang v&agrave; kinh đ&ocirc; điện ảnh Ph&aacute;p hoa lệ, thương hiệu&nbsp;<strong><a href="https://xwatch.vn/dong-ho-pc754/dong-ho-freelook.html">Đồng hồ nữ Freelook</a></strong>&nbsp;ngay từ khi ra mắt v&agrave;o năm 1999 đ&atilde; nhanh ch&oacute;ng trở th&agrave;nh m&oacute;n trang sức kiều diễm kh&ocirc;ng thể thiếu của c&aacute;c qu&yacute; c&ocirc; Ph&aacute;p. Sau đ&oacute;, thương hiệu n&agrave;y nhanh ch&oacute;ng lấn s&acirc;n sang Mỹ v&agrave; trở th&agrave;nh m&oacute;n phụ kiện b&aacute;n chạy nhất v&agrave;o năm 2004.</p>

                <p>Nhắc đến Freelook l&agrave; nhắc đến những cỗ m&aacute;y thời gian tinh xảo, c&oacute; lối thiết kế độc đ&aacute;o, ấn tượng (Free) c&ugrave;ng n&eacute;t thanh nh&atilde;, thời thượng hiếm c&oacute; (Look).</p>',
                'tr_logo'  => '/image/Image_Thuonghieu/5686650406503_brand-freelook.png' ,
                'created_at' => '2021-07-10 20:21:18'
            ],
            [
                'tr_name' => 'Ogival',
                'tr_slug' => 'ogival',
                'tr_desc' =>'<p>Đến với Xwatch bạn được chi&ecirc;m ngưỡng đa dạng c&aacute;c mẫu&nbsp;<strong>Đồng hồ Ogival</strong>&nbsp;v&agrave; thoải m&aacute;i lựa chọn cỗ m&aacute;y ph&ugrave; hợp với c&aacute; t&iacute;nh, phong c&aacute;ch của m&igrave;nh. Đặc biệt, khi&nbsp;mua Đồng hồ Ogival&nbsp;ch&iacute;nh h&atilde;ng&nbsp;tại đ&acirc;y, ngo&agrave;i bảo h&agrave;nh quốc tế, bạn c&ograve;n nhận được g&oacute;i &ldquo;<strong>Bảo hiểm đồng hồ CẢ LỖI NGƯỜI D&Ugrave;NG trong 5 năm - Đầu ti&ecirc;n tại Việt Nam</strong>&rdquo; trị gi&aacute; l&ecirc;n đến&nbsp;<strong>7 TRIỆU ĐỒNG</strong>.</p>',
                'tr_logo'  => '/image/Image_Thuonghieu/8467393593091_brand-ogival.png' ,
                'created_at' => '2021-05-04 16:21:18'
            ],
            [
                'tr_name' => 'OP Olym Pianus - Olympia Star',
                'tr_slug' => 'op-olym-pianus-olympia-star',
                'tr_desc' =>'<p>Được mệnh danh l&agrave; thương hiệu đồng hồ &ldquo;Ngon - Bổ - Rẻ&rdquo;,&nbsp;<strong><a href="https://xwatch.vn/dong-ho-pc754/dong-ho-op-olym-pianus-olympia-star.html">đồng hồ op</a></strong>&nbsp;được rất nhiều t&iacute;n đồ tại Việt Nam y&ecirc;u th&iacute;ch v&agrave; săn đ&oacute;n.&nbsp;Nếu muốn một sở hữu một chiếc&nbsp;<strong><a href="https://xwatch.vn/dong-ho-pc754.html">đồng hồ</a></strong>&nbsp;chất lượng, thiết kế đẹp, sang trọng, bộ m&aacute;y bền bỉ&nbsp;với c&aacute;c th&ocirc;ng số đảm bảo m&aacute;y chạy ổn định, chất liệu cao cấp&nbsp;th&igrave; Đồng hồ OP Olym Pianus - Olympia Star ch&iacute;nh l&agrave; lựa chọn s&aacute;ng gi&aacute; nhất trong tầm gi&aacute;.</p>',
                'tr_logo'  => '/image/Image_Thuonghieu/3258769885816_brand-op.png' ,
                'created_at' => '2021-04-12 18:06:18'
            ],
            [
                'tr_name' => 'Orient',
                'tr_slug' => 'orient',
                'tr_desc' =>'<p>Kh&aacute;m ph&aacute; c&aacute;c mẫu đồng hồ Orient nam, đồng hồ Orient nữ, đồng hồ Orient gi&aacute; rẻ đa dạng kiểu d&aacute;ng từ đồng hồ Orient mặt vu&ocirc;ng, đồng hồ Orient 1010, đồng hồ Orient Star cao cấp, đồng hồ Orient SK cổ đến đồng hồ Orient Bambino k&iacute;nh cong chất lượng bền bỉ v&agrave; thiết kế thanh lịch.</p>

                <p>Mua Đồng hồ Orient<strong>&nbsp;</strong>tại XWATCH c&oacute; nhiều ưu đ&atilde;i: MIỄN PH&Iacute; giao h&agrave;ng, bảo h&agrave;nh CẢ LỖI NGƯỜI D&Ugrave;NG trong 5 năm v&agrave; ĐỔI TRẢ trong v&ograve;ng 30 ng&agrave;y.</p>',
                'tr_logo'  => '/image/Image_Thuonghieu/3400387263591_brand-orient.png' ,
                'created_at' => '2021-06-04 14:06:18'
            ],
            [
                'tr_name' => 'Seiko',
                'tr_slug' => 'seiko',
                'tr_desc' =>'<p>Đồng hồ Seiko&nbsp;được biết đến l&agrave; thương hiệu số 1 v&agrave; c&oacute; lịch sử l&acirc;u đời nhất trong giới đồng hồ Nhật Bản trong suốt 130 năm kể từ ng&agrave;y th&agrave;nh lập.</p>

                <p>Kh&aacute;m ph&aacute; bộ sưu tập đồng hồ Seiko cơ, đồng hồ Seiko Quarzt, để biết đồng hồ Seiko nữ ch&iacute;nh h&atilde;ng gi&aacute; bao nhi&ecirc;u, bảng gi&aacute; đồng hồ Seiko, gi&aacute; đồng hồ Seiko 5, lịch sử đồng hồ Seiko Japan, chi&ecirc;m ngưỡng&nbsp;c&aacute;c mẫu đồng hồ Seiko nữ hot nhất, đến d&ograve;ng đồng hồ Seiko Presage, đồng hồ Seiko Primier cao cấp kh&aacute;c.</p>
                
                <p>Mua đồng hồ Seiko duy nhất tại Xwatch, bạn sẽ được hưởng chế độ bảo hiểm CẢ LỖI NGƯỜI D&Ugrave;NG c&ugrave;ng cam kết đền gấp 10 lần nếu ph&aacute;t hiện h&agrave;ng fake, free ship to&agrave;n quốc, đổi trả trong 30 ng&agrave;y.</p>',
                'tr_logo'  => '/image/Image_Thuonghieu/2175790014213_brand-seiko.png' ,
                'created_at' => '2021-06-12 10:32:10'
            ],
            [
                'tr_name' => 'SRWATCH',
                'tr_slug' => 'srwatch',
                'tr_desc' =>'<p>Kh&aacute;m ph&aacute; những mẫu Đồng hồ nam SRWATCH ch&iacute;nh h&atilde;ng Nhật Bản, thiết kế lịch l&atilde;m, mức gi&aacute; hợp l&yacute;, chất lượng đảm bảo. Đặc biệt khi lựa chọn Đồng hồ nam SRWATCH tại Xwatch được bảo h&agrave;nh 2 năm cả lỗi người d&ugrave;ng.</p>',
                'tr_logo'  => '/image/Image_Thuonghieu/9492091150206_brand-srwatch.png' ,
                'created_at' => '2021-06-12 18:06:18'
            ],
            [
                'tr_name' => 'Bentley',
                'tr_slug' => 'bentley',
                'tr_desc' =>'<p>Sở hữu thiết kế v&agrave; chất lượng cao cấp, Đồng hồ Bentley&nbsp; kh&ocirc;ng chỉ l&agrave; một phụ kiện xem giờ m&agrave; c&ograve;n trở th&agrave;nh biểu tượng tạo dựng n&ecirc;n phong c&aacute;ch ri&ecirc;ng của chủ sở hữu.</p>

                <p>C&ugrave;ng kh&aacute;m ph&aacute; những mẫu&nbsp;<strong><a href="https://xwatch.vn/dong-ho-pc754.html">đồng hồ</a></strong>&nbsp;đeo tay ch&iacute;nh h&atilde;ng đến từ c&aacute;c thương hiệu nổi tiếng của Nhật Bản, Thụy Sĩ, Hoa Kỳ, T&acirc;y Ban Nha, Đức,... được Xwatch ph&acirc;n phối để t&igrave;m kiếm tri kỷ thời gian v&agrave; khẳng định phong c&aacute;ch của ri&ecirc;ng m&igrave;nh.</p>
                
                <p>Duy nhất tại&nbsp;<a href="https://xwatch.vn/">Xwatch</a>, khi mua đồng hồ bạn sẽ được hưởng chế độ bảo hiểm CẢ LỖI NGƯỜI D&Ugrave;NG c&ugrave;ng cam kết đền gấp 10 lần nếu ph&aacute;t hiện h&agrave;ng fake.</p>',
                'tr_logo'  => '/image/Image_Thuonghieu/2619432886271_hang-bently.png' ,
                'created_at' => '2021-07-06 18:06:18'
            ],
          
           
        ]);


        DB::table('customers')->insert([
            [
                'Name' => Str::random(10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
            ],
            [
                'Name' => Str::random(10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
            ],
            [
                'Name' => Str::random(10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nữ' ,
                'Email' => Str::random(10).'@gmail.com',
            ],
            [
                'Name' => Str::random(10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
            ],
            [
                'Name' => Str::random(10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nữ' ,
                'Email' => Str::random(10).'@gmail.com',
            ],
            [
                'Name' => Str::random(10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
            ],
            [
                'Name' => Str::random(10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nữ' ,
                'Email' => Str::random(10).'@gmail.com',
            ],
            [
                'Name' => Str::random(10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
            ],
            [
                'Name' => Str::random(10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nữ' ,
                'Email' => Str::random(10).'@gmail.com',
            ],
            [
                'Name' => Str::random(10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nữ' ,
                'Email' => Str::random(10).'@gmail.com',
            ],
        ]);
        
    
        DB::table('products')->insert([
            [
                'MaSP' =>'NP03H-JAX',
                'ThuongHieu' => 'SeiKo',
                'NguonGoc' => 'Nhật Bản',
                'KieuMay'  => 'Automatic' ,
                'KichCo'  => '40' ,
                'DoDay'    => '11' ,
                'ChatLieuVo'    => 'Thép không gỉ 316L/Mạ PVD' ,
                'ChatLieuDay'   => 'Thép không gỉ 316L' ,
                'ChatLieuKinh'   => 'Kính Sapphire' ,
                'DoChiuNuoc'    => '30' ,
                'ChucNang'    => 'Power Reserve, Hacking Stop, Handwinding' ,
                'BaoHanh'    => '5 năm cả lỗi người dùng tại Xwatch' ,
                'GioiTinh'     => 'Nam' ,
                'Hot'     => 'Có' ,
                'GiaNhap'     => '15000000' ,
                'GiaBan'     => '32000000' ,
                'GiaKM'     => '28000000' ,
                'SoLuong'    => '100' ,
                'MoTa'     => 'Xwatch chào anh, thông số mặt sau đồng hồ hiẻn thị một số thông tin của đồng hồ nhưng không thể check được là hàng chính hãng hay không anh à.' ,
                
            ],
            [
                'MaSP' =>'OP9908-88AGSK-X',
                'ThuongHieu' => 'Olym Pianus',
                'NguonGoc' => 'Nhật Bản',
                'KieuMay'  => 'Lên Cót Tay' ,
                'KichCo'  => '38' ,
                'DoDay'    => '12' ,
                'ChatLieuVo'    => 'Thép không gỉ 316L/Mạ PVD' ,
                'ChatLieuDay'   => 'Titanium' ,
                'ChatLieuKinh'   => 'Kính Sapphire' ,
                'DoChiuNuoc'    => '30' ,
                'ChucNang'    => 'Lịch Ngày, Dạ Quang' ,
                'BaoHanh'    => '5 năm cả lỗi người dùng tại Xwatch' ,
                'GioiTinh'     => 'Nam' ,
                'Hot'     => 'Không' ,
                'GiaNhap'     => '7000000' ,
                'GiaBan'     => '16000000' ,
                'GiaKM'     => '13500000' ,
                'SoLuong'    => '100' ,
                'MoTa'     => 'Xwatch chào anh, thông số mặt sau đồng hồ hiẻn thị một số thông tin của đồng hồ nhưng không thể check được là hàng chính hãng hay không anh à.' ,
                
            ],
            [
                'MaSP' =>' BL1869-101MWWB-DMS-GL-T',
                'ThuongHieu' => 'BENTLEY',
                'NguonGoc' => 'Đức',
                'KieuMay'  => '	Quartz (Pin)' ,
                'KichCo'  => '40' ,
                'DoDay'    => '12' ,
                'ChatLieuVo'    => 'Thép không gỉ 316L/Mạ PVD' ,
                'ChatLieuDay'   => 'Dây Da' ,
                'ChatLieuKinh'   => 'Kính Sapphire' ,
                'DoChiuNuoc'    => '30' ,
                'ChucNang'    => 'Power Reserve, Hacking Stop, Handwinding' ,
                'BaoHanh'    => '5 năm cả lỗi người dùng tại Xwatch' ,
                'GioiTinh'     => 'Nam' ,
                'Hot'     => 'Có' ,
                'GiaNhap'     => '26000000' ,
                'GiaBan'     => '41000000' ,
                'GiaKM'     => '37000000' ,
                'SoLuong'    => '100' ,
                'MoTa'     => 'Xwatch chào anh, thông số mặt sau đồng hồ hiẻn thị một số thông tin của đồng hồ nhưng không thể check được là hàng chính hãng hay không anh à.' ,
                
            ],
            [
                'MaSP' =>'OG358.55AG42R-GL',
                'ThuongHieu' => 'OGIVAL ',
                'NguonGoc' => 'Thụy Sỹ',
                'KieuMay'  => 'Automatic' ,
                'KichCo'  => '42' ,
                'DoDay'    => '13' ,
                'ChatLieuVo'    => 'Thép không gỉ 316L/Mạ PVD' ,
                'ChatLieuDay'   => 'Dây Da' ,
                'ChatLieuKinh'   => 'Kính Sapphire' ,
                'DoChiuNuoc'    => '50' ,
                'ChucNang'    => 'Đính Kim Cương' ,
                'BaoHanh'    => '5 năm cả lỗi người dùng tại Xwatch' ,
                'GioiTinh'     => 'Nam' ,
                'Hot'     => 'Không' ,
                'GiaNhap'     => '40000000' ,
                'GiaBan'     => '72000000' ,
                'GiaKM'     => '56000000' ,
                'SoLuong'    => '50' ,
                'MoTa'     => 'Xwatch chào anh, thông số mặt sau đồng hồ hiẻn thị một số thông tin của đồng hồ nhưng không thể check được là hàng chính hãng hay không anh à.' ,
                
            ],
            [
                'MaSP' =>'SG1071.1202TE',
                'ThuongHieu' => 'SRWATCH',
                'NguonGoc' => 'Nhật Bản',
                'KieuMay'  => 'Quartz' ,
                'KichCo'  => '40' ,
                'DoDay'    => '6' ,
                'ChatLieuVo'    => 'Thép không gỉ 316L/Mạ PVD' ,
                'ChatLieuDay'   => 'Thép không gỉ 316L/Mạ PVD' ,
                'ChatLieuKinh'   => 'Kính Sapphire' ,
                'DoChiuNuoc'    => '50' ,
                'ChucNang'    => 'Lịch Ngày' ,
                'BaoHanh'    => '5 năm cả lỗi người dùng tại Xwatch' ,
                'GioiTinh'     => 'Nam' ,
                'Hot'     => 'Có' ,
                'GiaNhap'     => '8000000' ,
                'GiaBan'     => '17000000' ,
                'GiaKM'     => '0' ,
                'SoLuong'    => '100' ,
                'MoTa'     => 'Xwatch chào anh, thông số mặt sau đồng hồ hiẻn thị một số thông tin của đồng hồ nhưng không thể check được là hàng chính hãng hay không anh à.' ,
                
            ],
            [
                'MaSP' =>'SWR034P1',
                'ThuongHieu' => 'SEIKO ',
                'NguonGoc' => 'Nhật Bản',
                'KieuMay'  => 'Quartz' ,
                'KichCo'  => '32' ,
                'DoDay'    => '7' ,
                'ChatLieuVo'    => 'Thép không gỉ ' ,
                'ChatLieuDay'   => 'Thép không gỉ ' ,
                'ChatLieuKinh'   => 'Kính Cứng' ,
                'DoChiuNuoc'    => '50' ,
                'ChucNang'    => 'Lịch Ngày' ,
                'BaoHanh'    => '5 năm cả lỗi người dùng tại Xwatch' ,
                'GioiTinh'     => 'Nu' ,
                'Hot'     => 'Có' ,
                'GiaNhap'     => '5000000' ,
                'GiaBan'     => '12000000' ,
                'GiaKM'     => '10800000' ,
                'SoLuong'    => '100' ,
                'MoTa'     => 'Xwatch chào anh, thông số mặt sau đồng hồ hiẻn thị một số thông tin của đồng hồ nhưng không thể check được là hàng chính hãng hay không anh à.' ,
                
            ],
            [
                'MaSP' =>'RA-KB0004A10B',
                'ThuongHieu' => 'ORIENT',
                'NguonGoc' => 'Nhật Bản',
                'KieuMay'  => 'Quartz' ,
                'KichCo'  => '34' ,
                'DoDay'    => '8' ,
                'ChatLieuVo'    => 'Thép không gỉ 316L/Mạ Vàng PVD' ,
                'ChatLieuDay'   => 'Dây Da' ,
                'ChatLieuKinh'   => 'Kính Cứng' ,
                'DoChiuNuoc'    => '30' ,
                'ChucNang'    => 'Lịch Tuần Trăng' ,
                'BaoHanh'    => '5 năm cả lỗi người dùng tại Xwatch' ,
                'GioiTinh'     => 'Nu' ,
                'Hot'     => 'Không' ,
                'GiaNhap'     => '2000000' ,
                'GiaBan'     => '7000000' ,
                'GiaKM'     => '5400000' ,
                'SoLuong'    => '100' ,
                'MoTa'     => 'Xwatch chào anh, thông số mặt sau đồng hồ hiẻn thị một số thông tin của đồng hồ nhưng không thể check được là hàng chính hãng hay không anh à.' ,
                
            ],
            [
                'MaSP' =>'RA-KB0003S10B',
                'ThuongHieu' => 'ORIENT',
                'NguonGoc' => 'Nhật Bản',
                'KieuMay'  => 'Quartz' ,
                'KichCo'  => '34' ,
                'DoDay'    => '8' ,
                'ChatLieuVo'    => 'Thép không gỉ 316L/Mạ PVD' ,
                'ChatLieuDay'   => 'Dây Da' ,
                'ChatLieuKinh'   => 'Kính Cứng' ,
                'DoChiuNuoc'    => '30' ,
                'ChucNang'    => 'Lịch Tuần Trăng' ,
                'BaoHanh'    => '5 năm cả lỗi người dùng tại Xwatch' ,
                'GioiTinh'     => 'Nu' ,
                'Hot'     => 'Không' ,
                'GiaNhap'     => '5000000' ,
                'GiaBan'     => '12000000' ,
                'GiaKM'     => '9000000' ,
                'SoLuong'    => '100' ,
                'MoTa'     => 'Xwatch chào anh, thông số mặt sau đồng hồ hiẻn thị một số thông tin của đồng hồ nhưng không thể check được là hàng chính hãng hay không anh à.' ,
                
            ],
            [
                'MaSP' =>'OPA58012DLSK-T',
                'ThuongHieu' => 'OLYMPIA STAR',
                'NguonGoc' => 'Thụy Sỹ',
                'KieuMay'  => 'Swiss quartz (chạy pin)' ,
                'KichCo'  => '26' ,
                'DoDay'    => '8' ,
                'ChatLieuVo'    => 'Thép không gỉ 316L' ,
                'ChatLieuDay'   => 'Thép không gỉ 316L' ,
                'ChatLieuKinh'   => 'Kính Sapphire' ,
                'DoChiuNuoc'    => '30' ,
                'ChucNang'    => 'Lịch Tuần Trăng' ,
                'BaoHanh'    => '5 năm cả lỗi người dùng tại Xwatch' ,
                'GioiTinh'     => 'Nu' ,
                'Hot'     => 'Không' ,
                'GiaNhap'     => '45000000' ,
                'GiaBan'     => '84000000' ,
                'GiaKM'     => '66000000' ,
                'SoLuong'    => '100' ,
                'MoTa'     => 'Xwatch chào anh, thông số mặt sau đồng hồ hiẻn thị một số thông tin của đồng hồ nhưng không thể check được là hàng chính hãng hay không anh à.' ,
                
            ],
            [
                'MaSP' =>'OPA28019DLK-T',
                'ThuongHieu' => 'OLYMPIA STAR',
                'NguonGoc' => 'Thụy Sỹ',
                'KieuMay'  => 'Swiss quartz (chạy pin)' ,
                'KichCo'  => '32' ,
                'DoDay'    => '8' ,
                'ChatLieuVo'    => 'Thép không gỉ 316L/Mạ PVD' ,
                'ChatLieuDay'   => 'Thép không gỉ/Mạ vàng PVD' ,
                'ChatLieuKinh'   => 'Kính Sapphire' ,
                'DoChiuNuoc'    => '30' ,
                'ChucNang'    => 'Lịch Tuần Trăng' ,
                'BaoHanh'    => '5 năm cả lỗi người dùng tại Xwatch' ,
                'GioiTinh'     => 'Nu' ,
                'Hot'     => 'Có' ,
                'GiaNhap'     => '12000000' ,
                'GiaBan'     => '34000000' ,
                'GiaKM'     => '24000000' ,
                'SoLuong'    => '100' ,
                'MoTa'     => 'Xwatch chào anh, thông số mặt sau đồng hồ hiẻn thị một số thông tin của đồng hồ nhưng không thể check được là hàng chính hãng hay không anh à.' ,
                
            ],
            [
                'MaSP' =>'BL1868-201LRWI-LR-T',
                'ThuongHieu' => 'BENTLEY',
                'NguonGoc' => 'Đức',
                'KieuMay'  => 'Quartz' ,
                'KichCo'  => '32' ,
                'DoDay'    => '8' ,
                'ChatLieuVo'    => 'Thép không gỉ 316' ,
                'ChatLieuDay'   => '	Thép không gỉ' ,
                'ChatLieuKinh'   => 'Kính Sapphire' ,
                'DoChiuNuoc'    => '30' ,
                'ChucNang'    => 'Lịch Ngày' ,
                'BaoHanh'    => '5 năm cả lỗi người dùng tại Xwatch' ,
                'GioiTinh'     => 'Nu' ,
                'Hot'     => 'Có' ,
                'GiaNhap'     => '17000000' ,
                'GiaBan'     => '28000000' ,
                'GiaKM'     => '0' ,
                'SoLuong'    => '100' ,
                'MoTa'     => 'Xwatch chào anh, thông số mặt sau đồng hồ hiẻn thị một số thông tin của đồng hồ nhưng không thể check được là hàng chính hãng hay không anh à.' ,
                
            ],
            [
                'MaSP' =>'BH3002-03A/EJ6122-08A',
                'ThuongHieu' => 'Citizen',
                'NguonGoc' => 'Nhật Bản',
                'KieuMay'  => 'Quartz(Pin)' ,
                'KichCo'  => '28' ,
                'DoDay'    => '8' ,
                'ChatLieuVo'    => 'Thép không gỉ' ,
                'ChatLieuDay'   => '	Thép không gỉ' ,
                'ChatLieuKinh'   => 'Kính khoáng Mineral' ,
                'DoChiuNuoc'    => '30' ,
                'ChucNang'    => 'Lịch Ngày' ,
                'BaoHanh'    => '5 năm cả lỗi người dùng tại Xwatch' ,
                'GioiTinh'     => 'Cap-Doi' ,
                'Hot'     => 'Có' ,
                'GiaNhap'     => '3000000' ,
                'GiaBan'     => '7000000' ,
                'GiaKM'     => '0' ,
                'SoLuong'    => '100' ,
                'MoTa'     => 'Xwatch chào anh, thông số mặt sau đồng hồ hiẻn thị một số thông tin của đồng hồ nhưng không thể check được là hàng chính hãng hay không anh à.' ,
                
            ],
            [
                'MaSP' =>'S392J202Y/S393J202Y',
                'ThuongHieu' => 'Q&Q',
                'NguonGoc' => 'Nhật bản',
                'KieuMay'  => 'Quartz' ,
                'KichCo'  => '40' ,
                'DoDay'    => '11' ,
                'ChatLieuVo'    => 'Thép không gỉ 316' ,
                'ChatLieuDay'   => '	Thép không gỉ' ,
                'ChatLieuKinh'   => 'Kính Sapphire' ,
                'DoChiuNuoc'    => '50' ,
                'ChucNang'    => 'Lịch Ngày' ,
                'BaoHanh'    => '5 năm cả lỗi người dùng tại Xwatch' ,
                'GioiTinh'     => 'Cap-Doi' ,
                'Hot'     => 'Có' ,
                'GiaNhap'     => '11000000' ,
                'GiaBan'     => '23000000' ,
                'GiaKM'     => '17000000' ,
                'SoLuong'    => '100' ,
                'MoTa'     => 'Xwatch chào anh, thông số mặt sau đồng hồ hiẻn thị một số thông tin của đồng hồ nhưng không thể check được là hàng chính hãng hay không anh à.' ,
                
            ],
        ]);
        DB::table('images')->insert([
            [
                'Product_id' => '1',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam1.png' , 
            ],
            [
                'Product_id' => '1',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam2.png' ,     
            ],
            [
                'Product_id' => '1',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam3.png' , 
            ],
            [
                'Product_id' => '1',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam4.png' , 
            ],
            [
                'Product_id' => '1',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam5.png' ,
            ],
            [
                'Product_id' => '2',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam6.png' , 
            ],
            [
                'Product_id' => '2',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam7.png' , 
            ],
            [
                'Product_id' => '2',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam8.png' ,  
            ],
            [
                'Product_id' => '2',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam9.png' ,  
            ],
            [
                'Product_id' => '2',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam10.png' ,  
            ],
            [
                'Product_id' => '3',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam11.jpg' ,  
            ],
            [
                'Product_id' => '3',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam12.jpg' ,  
            ],
            [
                'Product_id' => '3',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam13.jpg' ,  
            ],
            [
                'Product_id' => '3',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam14.jpg' ,  
            ],
            [
                'Product_id' => '3',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nam15.jpg' ,  
            ],
            [
                'Product_id' => '4',
                'Name' => Str::random(10),
                'File_path' => '/image/default/w4.jpg' ,  
            ],
            [
                'Product_id' => '4',
                'Name' => Str::random(10),
                'File_path' => '/image/default/w9.jpg' ,  
            ],
            [
                'Product_id' => '4',
                'Name' => Str::random(10),
                'File_path' => '/image/default/w10.jpg' ,  
            ],
            [
                'Product_id' => '4',
                'Name' => Str::random(10),
                'File_path' => '/image/default/w11.jpg' ,  
            ],
            [
                'Product_id' => '4',
                'Name' => Str::random(10),
                'File_path' => '/image/default/w12.jpg' ,  
            ],
            [
                'Product_id' => '5',
                'Name' => Str::random(10),
                'File_path' => '/image/default/x5.jpg' ,  
            ],
            [
                'Product_id' => '5',
                'Name' => Str::random(10),
                'File_path' => '/image/default/x1.jpg' ,  
            ],
            [
                'Product_id' => '5',
                'Name' => Str::random(10),
                'File_path' => '/image/default/x2.jpg' ,  
            ],
            [
                'Product_id' => '5',
                'Name' => Str::random(10),
                'File_path' => '/image/default/x3.jpg' ,  
            ],
            [
                'Product_id' => '5',
                'Name' => Str::random(10),
                'File_path' => '/image/default/x4.jpg' ,  
            ],
            [
                'Product_id' => '6',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu1.jpg' ,  
            ],
            [
                'Product_id' => '6',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu2.jpg' ,  
            ],
            [
                'Product_id' => '6',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu3.jpg' ,  
            ],
            [
                'Product_id' => '6',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu4.jpg' ,  
            ],
            [
                'Product_id' => '6',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu5.jpg' ,  
            ],
            [
                'Product_id' => '7',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu6.jpg' ,  
            ],
            [
                'Product_id' => '7',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu7.jpg' ,  
            ],
            [
                'Product_id' => '7',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu8.jpg' ,  
            ],
            [
                'Product_id' => '7',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu9.jpg' ,  
            ],
            [
                'Product_id' => '7',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu10.jpg' ,  
            ],
            [
                'Product_id' => '8',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu11.jpg' ,  
            ],
            [
                'Product_id' => '8',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu12.jpg' ,  
            ],
            [
                'Product_id' => '8',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu13.jpg' ,  
            ],
            [
                'Product_id' => '8',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu14.jpg' ,  
            ],
            [
                'Product_id' => '8',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu15.jpg' ,  
            ],
            [
                'Product_id' => '9',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu16.jpg' ,  
            ],
            [
                'Product_id' => '9',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu17.jpg' ,  
            ],
            [
                'Product_id' => '9',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu18.jpg' ,  
            ],
            [
                'Product_id' => '9',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu19.jpg' ,  
            ],
            [
                'Product_id' => '9',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu20.jpg' ,  
            ],
            [
                'Product_id' => '10',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu23.jpg' ,  
            ],
            [
                'Product_id' => '10',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu21.jpg' ,  
            ],
            [
                'Product_id' => '10',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu22.jpg' ,  
            ],
            [
                'Product_id' => '10',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu24.jpg' ,  
            ],
            [
                'Product_id' => '10',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu25.jpg' ,  
            ],
            [
                'Product_id' => '11',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu26.jpg' ,  
            ],
            [
                'Product_id' => '11',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu27.jpg' ,  
            ],
            [
                'Product_id' => '11',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu28.jpg' ,  
            ],
            [
                'Product_id' => '11',
                'Name' => Str::random(10),
                'File_path' => '/image/default/nu29.jpg' ,  
            ],
            [
                'Product_id' => '11',
                'Name' => Str::random(11),
                'File_path' => '/image/default/nu30.jpg' ,  
            ],
            [
                'Product_id' => '12',
                'Name' => Str::random(10),
                'File_path' => '/image/default/cd1.jpg' ,  
            ],
            [
                'Product_id' => '12',
                'Name' => Str::random(10),
                'File_path' => '/image/default/cd2.jpg' ,  
            ],
            [
                'Product_id' => '12',
                'Name' => Str::random(10),
                'File_path' => '/image/default/cd3.jpg' ,  
            ],
            [
                'Product_id' => '12',
                'Name' => Str::random(10),
                'File_path' => '/image/default/cd4.jpg' ,  
            ],
            [
                'Product_id' => '12',
                'Name' => Str::random(10),
                'File_path' => '/image/default/cd5.jpg' ,  
            ],
            [
                'Product_id' => '13',
                'Name' => Str::random(11),
                'File_path' => '/image/default/cd6.jpg' ,  
            ],
            [
                'Product_id' => '13',
                'Name' => Str::random(11),
                'File_path' => '/image/default/cd7.jpg' ,  
            ],
            [
                'Product_id' => '13',
                'Name' => Str::random(11),
                'File_path' => '/image/default/cd8.jpg' ,  
            ],
            [
                'Product_id' => '13',
                'Name' => Str::random(11),
                'File_path' => '/image/default/cd9.jpg' ,  
            ],
            [
                'Product_id' => '13',
                'Name' => Str::random(11),
                'File_path' => '/image/default/cd10.jpg' ,  
            ],
        ]);
    
        DB::table('orders')->insert([
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '84000000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Chờ Duyệt' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '87500000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Chờ Duyệt' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '56000000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Chờ Duyệt' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '90000000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Chờ Duyệt' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nữ' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '10800000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Đang Giao' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nữ' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '10800000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Chờ Duyệt' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '27000000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Đang Giao' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '66000000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Chờ Duyệt' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nữ' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '48000000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Đang Giao' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '56000000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Đang Giao' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '9000000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Chờ Duyệt' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nữ' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '14000000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Đang Giao' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '34000000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Đã Giao' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nữ' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '24000000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Đã Giao' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nữ' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '10800000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Đã Giao' ,  
            ],
    
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nam' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '48000000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Đã Giao' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nữ' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '66000000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Đã Giao' ,  
            ],
            [
                'Name' => Str::random(10),
                'Customer_id'=> rand(1,10),
                'Phone' => random_int(1000000,55555555),
                'Address' => Str::random(10),
                'Gender'  => 'Nữ' ,
                'Email' => Str::random(10).'@gmail.com',
                'TongTien'  => '17000000' ,
                'HinhThucThanhToan' => 'Thanh toán khi nhận hàng',
                'GhiChu'  => Str::random(50) ,
                'TrangThai'  => 'Đã Giao' ,  
            ],
            
        ]);
    
        DB::table('items')->insert([
            [
                'Order_id' => '1',
                'MaSP' => 'NP03H-JAX',
                'SoLuong' => '3' , 
                'Gia' => '28000000',
                'TongTien'=> '84000000'
            ],
            [
                'Order_id' => '2',
                'MaSP' => 'OP9908-88AGSK-X',
                'SoLuong' => '1' , 
                'Gia' => '13500000',
                'TongTien'=> '13500000'
            ],
            [
                'Order_id' => '2',
                'MaSP' => 'BL1869-101MWWB-DMS-GL-T',
                'SoLuong' => '2' , 
                'Gia' => '37000000',
                'TongTien'=> '74000000'
            ],
            [
                'Order_id' => '3',
                'MaSP' => 'OG358.55AG42R-GL',
                'SoLuong' => '1' , 
                'Gia' => '56000000',
                'TongTien'=> '56000000'
            ],
            [
                'Order_id' => '4',
                'MaSP' => 'SG1071.1202TE',
                'SoLuong' => '2' , 
                'Gia' => '17000000',
                'TongTien'=> '34000000'
            ],
            [
                'Order_id' => '4',
                'MaSP' => 'OG358.55AG42R-GL',
                'SoLuong' => '1' , 
                'Gia' => '56000000',
                'TongTien'=> '56000000'
            ],
            [
                'Order_id' => '5',
                'MaSP' => 'SWR034P1',
                'SoLuong' => '1' , 
                'Gia' => '10800000',
                'TongTien'=> '10800000'
            ],
            [
                'Order_id' => '6',
                'MaSP' => 'RA-KB0004A10B',
                'SoLuong' => '2' , 
                'Gia' => '5400000',
                'TongTien'=> '10800000'
            ],
            [
                'Order_id' => '7',
                'MaSP' => 'RA-KB0003S10B',
                'SoLuong' => '3' , 
                'Gia' => '9000000',
                'TongTien'=> '27000000'
            ],
            [
                'Order_id' => '8',
                'MaSP' => 'OPA58012DLSK-T',
                'SoLuong' => '1' , 
                'Gia' => '66000000',
                'TongTien'=> '66000000'
            ],
            [
                'Order_id' => '9',
                'MaSP' => 'OPA28019DLK-T',
                'SoLuong' => '2' , 
                'Gia' => '24000000',
                'TongTien'=> '48000000'
            ],
            [
                'Order_id' => '10',
                'MaSP' => 'BL1868-201LRWI-LR-T',
                'SoLuong' => '2' , 
                'Gia' => '28000000',
                'TongTien'=> '56000000',
            ],
            [
                'Order_id' => '11',
                'MaSP' => 'RA-KB0003S10B',
                'SoLuong' => '1' , 
                'Gia' => '9000000',
                'TongTien'=> '9000000'
            ],
            [
                'Order_id' => '12',
                'MaSP' => 'BH3002-03A/EJ6122-08A',
                'SoLuong' => '2' , 
                'Gia' => '7000000',
                'TongTien'=> '14000000'
            ],
            [
                'Order_id' => '13',
                'MaSP' => 'S392J202Y/S393J202Y',
                'SoLuong' => '2' , 
                'Gia' => '17000000',
                'TongTien'=> '34000000',
            ],
            [
                'Order_id' => '14',
                'MaSP' => 'OPA28019DLK-T',
                'SoLuong' => '1' , 
                'Gia' => '24000000',
                'TongTien'=> '24000000'
            ],
            [
                'Order_id' => '15',
                'MaSP' => 'SWR034P1',
                'SoLuong' => '1' , 
                'Gia' => '10800000',
                'TongTien'=> '10800000'
            ],
            [
                'Order_id' => '16',
                'MaSP' => 'OPA28019DLK-T',
                'SoLuong' => '2' , 
                'Gia' => '24000000',
                'TongTien'=> '48000000',
            ],
            [
                'Order_id' => '17',
                'MaSP' => 'OPA58012DLSK-T',
                'SoLuong' => '1' , 
                'Gia' => '66000000',
                'TongTien'=> '66000000'
            ],
            [
                'Order_id' => '18',
                'MaSP' => 'SG1071.1202TE',
                'SoLuong' => '1' , 
                'Gia' => '17000000',
                'TongTien'=> '17000000'
            ],
           
    
        ]);
    
        DB::table('rates')->insert([
            [
                'Product_id' => '1',
                'User_id' => '7',
                'Star' =>rand(1,5),
                'Content'  => Str::random(20) ,
                
            ],
            [
                'Product_id' => '2',
                'User_id' => '7',
                'Star' =>rand(1,5),
                'Content'  => Str::random(20) ,
                
            ],
            [
                'Product_id' => '3',
                'User_id' => '7',
                'Star' =>rand(1,5),
                'Content'  => Str::random(20) ,
                
            ],
            [
                'Product_id' => '4',
                'User_id' => '7',
                'Star' =>rand(1,5),
                'Content'  => Str::random(20) ,
                
            ],
            [
                'Product_id' => '1',
                'User_id' => '8',
                'Star' =>rand(1,5),
                'Content'  => Str::random(20) ,
                
            ],
            [
                'Product_id' => '1',
                'User_id' => '6',
                'Star' =>rand(1,5),
                'Content'  => Str::random(20) ,
                
            ],
            [
                'Product_id' => '1',
                'User_id' => '9',
                'Star' =>rand(1,5),
                'Content'  => Str::random(20) ,
                
            ],
            [
                'Product_id' => '10',
                'User_id' => '8',
                'Star' =>rand(1,5),
                'Content'  => Str::random(20) ,
                
            ],
            [
                'Product_id' => '5',
                'User_id' => '8',
                'Star' =>rand(1,5),
                'Content'  => Str::random(20) ,
                
            ],
            [
                'Product_id' => '8',
                'User_id' => '8',
                'Star' =>rand(1,5),
                'Content'  => Str::random(20) ,
                
            ],
            [
                'Product_id' => '6',
                'User_id' => '9',
                'Star' =>rand(1,5),
                'Content'  => Str::random(20) ,
                
            ],
            [
                'Product_id' => '4',
                'User_id' => '7',
                'Star' =>rand(1,5),
                'Content'  => Str::random(20) ,
                
            ],
            [
                'Product_id' => '9',
                'User_id' => '6',
                'Star' =>rand(1,5),
                'Content'  => Str::random(20) ,
                
            ],
            [
                'Product_id' => '8',
                'User_id' => '6',
                'Star' =>rand(1,5),
                'Content'  => Str::random(20) ,
                
            ],
           
        ]);
        DB::table('comments')->insert([
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),  
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),  
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30), 
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30), 
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30), 
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),   
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30), 
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),  
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),  
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30), 
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30), 
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30), 
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),   
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30), 
            ],
            [
                'Product_id' => rand(1,10),
                'User_id' => rand(7,12),
                'Content' =>Str::random(30),
            ],
           
        ]);
    }
}
