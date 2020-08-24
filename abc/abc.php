<?php
  /*  +Bảng menus: bảng này là tùy ý dựng hay không,
  tạo ra menu động các trường có thẻ có của bàng này
  THường bảng nào cungxsex có 4 trường sau:
  id khoa chinh
  name: tên các menu con, VARCHAR(50)
  url: link cho các menu con, VARCHAR(255
  parent_id id cha của menu con hiện tại
  status trạng thái ẩn thiện TINYINT
  
  
  + Bảng products: chứa các thông tin về sản phẩm,
   tên bảng thường sẽ đặt ở dạng số nhiều

id: khóa chín, AUTO_INCREMENT
avatar: lưu file ảnh
title: tên sp
priec: giá sp
content TẼT
amount
summary: mô tả ngắn cho sản phẩm, VARCHAR(255)
seo_tittle: seo cho tiêu đề của sản phẩm,
status: trạng thái, TINYINT 0- ẩn, 1 - hiển thị
created_at:
updated_at:

news: bảng lưu các thông tin liên quan đên tin tức
id
avatar:
title: tên tin tức
summary: mô tả ngắn
content: 
seo_title:
seo_description
seo_keywords: 
status
created_at
updated_at







?>