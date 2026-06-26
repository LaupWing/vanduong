<?php
/**
 * Sample product seeder for Vanduong.
 *
 * Adds an admin page under Tools → Seeder with a button that seeds 20 demo
 * WooCommerce products (Vietnamese) so there is something to look at in the shop.
 * Seeding is idempotent: products are matched by SKU and skipped if they exist.
 *
 * @package Vanduong
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * The demo product catalogue. Prices are in the store currency (numeric only).
 * 'sale' is optional. 'cat' is the product category name.
 *
 * @return array
 */
function vanduong_sample_products()
{
    return array(
        // Nến thơm — Scented candles.
        array('sku' => 'VD-NEN-01', 'name' => 'Nến thơm Sả Chanh', 'cat' => 'Nến thơm', 'price' => 14.50, 'sale' => 11.90, 'stock' => 40, 'short' => 'Nến đậu nành thơm sả chanh, cháy sạch trong 35 giờ.', 'desc' => 'Nến thơm thủ công làm từ sáp đậu nành nguyên chất, hương sả chanh tươi mát giúp thư giãn và xua đuổi côn trùng. Bấc cotton không khói, thời gian cháy khoảng 35 giờ.'),
        array('sku' => 'VD-NEN-02', 'name' => 'Nến thơm Hoa Nhài', 'cat' => 'Nến thơm', 'price' => 15.90, 'stock' => 35, 'short' => 'Hương hoa nhài dịu nhẹ cho không gian thư thái.', 'desc' => 'Hương hoa nhài tự nhiên lan tỏa nhẹ nhàng, mang lại cảm giác bình yên cho phòng ngủ hoặc phòng khách. Đổ thủ công trong ly thủy tinh tái sử dụng.'),
        array('sku' => 'VD-NEN-03', 'name' => 'Nến thơm Gỗ Đàn Hương', 'cat' => 'Nến thơm', 'price' => 17.50, 'stock' => 28, 'short' => 'Hương gỗ đàn hương ấm áp, sang trọng.', 'desc' => 'Hương gỗ đàn hương trầm ấm tạo không gian ấm cúng. Sáp đậu nành pha sáp ong, cháy đều và lâu tàn.'),
        array('sku' => 'VD-NEN-04', 'name' => 'Nến thơm Cà Phê', 'cat' => 'Nến thơm', 'price' => 13.90, 'stock' => 50, 'short' => 'Hương cà phê rang đậm đà, đánh thức giác quan.', 'desc' => 'Hương cà phê rang xay nguyên bản, hoàn hảo cho góc làm việc buổi sáng. Bấc gỗ tạo tiếng tí tách dễ chịu khi cháy.'),

        // Gốm sứ — Ceramics.
        array('sku' => 'VD-GOM-01', 'name' => 'Cốc Gốm Men Xanh', 'cat' => 'Gốm sứ', 'price' => 19.00, 'stock' => 24, 'short' => 'Cốc gốm vuốt tay, men xanh ngọc thủ công.', 'desc' => 'Mỗi chiếc cốc được vuốt tay trên bàn xoay và phủ men xanh ngọc độc bản. Dung tích 300ml, an toàn với lò vi sóng và máy rửa chén.'),
        array('sku' => 'VD-GOM-02', 'name' => 'Bát Gốm Mộc', 'cat' => 'Gốm sứ', 'price' => 22.50, 'stock' => 20, 'short' => 'Bát gốm tông màu mộc tự nhiên, dáng tối giản.', 'desc' => 'Bát gốm nung ở nhiệt độ cao với lớp men mộc nhám tự nhiên. Phù hợp đựng salad, súp hay trang trí. Đường kính 16cm.'),
        array('sku' => 'VD-GOM-03', 'name' => 'Bình Hoa Gốm Cổ Cao', 'cat' => 'Gốm sứ', 'price' => 28.00, 'sale' => 23.50, 'stock' => 15, 'short' => 'Bình hoa dáng cổ cao, men rạn nghệ thuật.', 'desc' => 'Bình hoa gốm dáng cổ cao thanh thoát với hiệu ứng men rạn độc đáo. Điểm nhấn tinh tế cho bàn trà hoặc kệ sách. Cao 24cm.'),
        array('sku' => 'VD-GOM-04', 'name' => 'Đĩa Gốm Trang Trí', 'cat' => 'Gốm sứ', 'price' => 18.50, 'stock' => 30, 'short' => 'Đĩa gốm vẽ tay họa tiết lá nhiệt đới.', 'desc' => 'Đĩa gốm trang trí vẽ tay từng nét họa tiết lá nhiệt đới. Vừa dùng được vừa làm vật trang trí treo tường. Đường kính 20cm.'),

        // Xà phòng & chăm sóc — Handmade soap & care.
        array('sku' => 'VD-XP-01', 'name' => 'Xà Phòng Than Tre', 'cat' => 'Xà phòng thủ công', 'price' => 8.50, 'stock' => 60, 'short' => 'Xà phòng than tre hoạt tính làm sạch sâu.', 'desc' => 'Xà phòng thủ công với than tre hoạt tính giúp làm sạch sâu và kiểm soát dầu. Không chứa hóa chất tạo bọt công nghiệp. Khối lượng 100g.'),
        array('sku' => 'VD-XP-02', 'name' => 'Xà Phòng Mật Ong Yến Mạch', 'cat' => 'Xà phòng thủ công', 'price' => 9.00, 'stock' => 55, 'short' => 'Dưỡng ẩm dịu nhẹ với mật ong và yến mạch.', 'desc' => 'Công thức mật ong nguyên chất và yến mạch xay mịn, tẩy tế bào chết nhẹ nhàng và dưỡng ẩm cho da khô. Phù hợp da nhạy cảm.'),
        array('sku' => 'VD-XP-03', 'name' => 'Xà Phòng Hoa Oải Hương', 'cat' => 'Xà phòng thủ công', 'price' => 9.50, 'sale' => 7.90, 'stock' => 45, 'short' => 'Hương oải hương thư giãn, nụ hoa thật.', 'desc' => 'Xà phòng oải hương với tinh dầu nguyên chất và nụ hoa khô thật, giúp thư giãn tinh thần và làm dịu da. Khối lượng 100g.'),
        array('sku' => 'VD-XP-04', 'name' => 'Son Dưỡng Môi Sáp Ong', 'cat' => 'Xà phòng thủ công', 'price' => 6.50, 'stock' => 70, 'short' => 'Son dưỡng sáp ong tự nhiên, không màu.', 'desc' => 'Son dưỡng môi làm từ sáp ong, dầu dừa và vitamin E, giúp môi mềm mịn suốt ngày dài. Hũ thiếc tái sử dụng 10g.'),

        // Đồ trang trí — Home decor.
        array('sku' => 'VD-TT-01', 'name' => 'Thảm Treo Tường Macrame', 'cat' => 'Đồ trang trí', 'price' => 32.00, 'stock' => 18, 'short' => 'Macrame đan tay từ sợi cotton tự nhiên.', 'desc' => 'Thảm treo tường macrame đan tay tỉ mỉ từ sợi cotton 100%, mang phong cách boho ấm áp cho không gian sống. Rộng 45cm.'),
        array('sku' => 'VD-TT-02', 'name' => 'Giỏ Cói Đan Tay', 'cat' => 'Đồ trang trí', 'price' => 24.00, 'stock' => 26, 'short' => 'Giỏ cói tự nhiên đa năng, đan thủ công.', 'desc' => 'Giỏ cói đan tay từ cói tự nhiên, dùng để đựng đồ, cây cảnh hoặc trang trí. Bền chắc và thân thiện môi trường.'),
        array('sku' => 'VD-TT-03', 'name' => 'Chậu Cây Bê Tông Mini', 'cat' => 'Đồ trang trí', 'price' => 12.50, 'stock' => 40, 'short' => 'Chậu bê tông đúc tay cho cây mọng nước.', 'desc' => 'Chậu cây bê tông đúc thủ công với bề mặt nhám hiện đại, hoàn hảo cho sen đá và xương rồng. Có lỗ thoát nước.'),
        array('sku' => 'VD-TT-04', 'name' => 'Đèn Mây Tre Đan', 'cat' => 'Đồ trang trí', 'price' => 39.00, 'sale' => 33.00, 'stock' => 12, 'short' => 'Chao đèn mây tre đan tạo ánh sáng ấm.', 'desc' => 'Chao đèn mây tre đan thủ công tạo hiệu ứng ánh sáng đan xen ấm áp và lãng mạn. Phù hợp phòng khách và quán cà phê.'),

        // Phụ kiện — Accessories.
        array('sku' => 'VD-PK-01', 'name' => 'Túi Tote Vải Canvas', 'cat' => 'Phụ kiện', 'price' => 16.00, 'stock' => 50, 'short' => 'Túi tote canvas in họa tiết thủ công.', 'desc' => 'Túi tote vải canvas dày dặn, in lụa thủ công họa tiết độc quyền Vanduong. Bền, rộng rãi và thân thiện môi trường.'),
        array('sku' => 'VD-PK-02', 'name' => 'Khăn Lụa Vẽ Tay', 'cat' => 'Phụ kiện', 'price' => 29.00, 'stock' => 16, 'short' => 'Khăn lụa vẽ tay, mỗi chiếc là độc bản.', 'desc' => 'Khăn lụa cao cấp được vẽ tay từng họa tiết, không chiếc nào giống chiếc nào. Mềm mại và sang trọng. Kích thước 90x90cm.'),
        array('sku' => 'VD-PK-03', 'name' => 'Vòng Tay Hạt Gỗ', 'cat' => 'Phụ kiện', 'price' => 11.00, 'sale' => 8.50, 'stock' => 65, 'short' => 'Vòng tay hạt gỗ tự nhiên đánh bóng tay.', 'desc' => 'Vòng tay làm từ hạt gỗ tự nhiên được đánh bóng thủ công, dây co giãn vừa mọi cỡ tay. Mộc mạc và tinh tế.'),
        array('sku' => 'VD-PK-04', 'name' => 'Sổ Tay Bìa Da Thủ Công', 'cat' => 'Phụ kiện', 'price' => 21.00, 'stock' => 22, 'short' => 'Sổ tay bìa da thật, giấy tái chế.', 'desc' => 'Sổ tay bìa da thật khâu tay với ruột giấy tái chế không tẩy trắng. Người bạn đồng hành lý tưởng cho mọi ý tưởng. 200 trang.'),
    );
}

/**
 * Register the Tools → Seeder admin page.
 */
function vanduong_register_seeder_page()
{
    add_management_page(
        __('Seeder sản phẩm', 'vanduong'),
        __('Seeder', 'vanduong'),
        'manage_options',
        'vanduong-seeder',
        'vanduong_render_seeder_page'
    );
}
add_action('admin_menu', 'vanduong_register_seeder_page');

/**
 * Resolve (or create) a product category by name, return its term ID.
 *
 * @param string $name
 * @return int
 */
function vanduong_get_or_create_product_cat($name)
{
    $term = get_term_by('name', $name, 'product_cat');
    if ($term) {
        return (int) $term->term_id;
    }
    $result = wp_insert_term($name, 'product_cat');
    return is_wp_error($result) ? 0 : (int) $result['term_id'];
}

/**
 * Create the demo products. Skips any SKU that already exists.
 *
 * @return array{created:int, skipped:int}
 */
function vanduong_seed_products()
{
    $created = 0;
    $skipped = 0;

    foreach (vanduong_sample_products() as $p) {
        if (wc_get_product_id_by_sku($p['sku'])) {
            $skipped++;
            continue;
        }

        $product = new WC_Product_Simple();
        $product->set_name($p['name']);
        $product->set_status('publish');
        $product->set_catalog_visibility('visible');
        $product->set_sku($p['sku']);
        $product->set_regular_price((string) $p['price']);

        if (! empty($p['sale'])) {
            $product->set_sale_price((string) $p['sale']);
        }

        $product->set_description($p['desc']);
        $product->set_short_description($p['short']);
        $product->set_manage_stock(true);
        $product->set_stock_quantity((int) $p['stock']);
        $product->set_stock_status('instock');

        $cat_id = vanduong_get_or_create_product_cat($p['cat']);
        if ($cat_id) {
            $product->set_category_ids(array($cat_id));
        }

        $product->save();

        // Attach a relevant placeholder image so the shop isn't empty.
        $image_id = vanduong_sideload_product_image($product->get_id(), $p);
        if ($image_id) {
            $product->set_image_id($image_id);
            $product->save();
        }

        $created++;
    }

    return array('created' => $created, 'skipped' => $skipped);
}

/**
 * Map a product category to an image search keyword.
 *
 * @param string $cat
 * @return string
 */
function vanduong_image_keyword($cat)
{
    $map = array(
        'Nến thơm'          => 'candle',
        'Gốm sứ'            => 'pottery',
        'Xà phòng thủ công' => 'soap',
        'Đồ trang trí'      => 'home,decor',
        'Phụ kiện'          => 'handmade',
    );
    return isset($map[$cat]) ? $map[$cat] : 'handmade';
}

/**
 * Download a placeholder image into the media library and return its attachment ID.
 * Tries a keyword image first, then a stable random fallback. Returns 0 on failure.
 *
 * @param int   $product_id
 * @param array $p Product data (uses 'cat' and 'sku').
 * @return int
 */
function vanduong_sideload_product_image($product_id, $p)
{
    if (! $product_id) {
        return 0;
    }

    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $lock    = abs(crc32($p['sku'])) % 1000;
    $keyword = rawurlencode(vanduong_image_keyword($p['cat']));

    // Note: these URLs have no file extension, so we download them manually and
    // give the sideload an explicit .jpg name (media_sideload_image would reject them).
    $sources = array(
        'https://loremflickr.com/800/800/' . $keyword . '?lock=' . $lock,
        'https://picsum.photos/seed/' . rawurlencode($p['sku']) . '/800/800',
    );

    foreach ($sources as $url) {
        $tmp = download_url($url, 30);
        if (is_wp_error($tmp)) {
            continue;
        }

        $file = array(
            'name'     => sanitize_file_name($p['sku'] . '.jpg'),
            'tmp_name' => $tmp,
        );

        $id = media_handle_sideload($file, $product_id, $p['name']);

        if (is_wp_error($id)) {
            if (file_exists($tmp)) {
                @unlink($tmp);
            }
            continue;
        }

        return (int) $id;
    }

    return 0;
}

/**
 * Permanently delete every demo product (matched by SKU).
 *
 * @return int Number deleted.
 */
function vanduong_delete_seeded_products()
{
    $deleted = 0;
    foreach (vanduong_sample_products() as $p) {
        $id = wc_get_product_id_by_sku($p['sku']);
        if ($id) {
            wp_delete_post($id, true);
            $deleted++;
        }
    }
    return $deleted;
}

/**
 * Render the Tools → Seeder page and handle form submissions.
 */
function vanduong_render_seeder_page()
{
    if (! current_user_can('manage_options')) {
        return;
    }

    $notice = '';

    if (isset($_POST['vanduong_seeder_action']) && check_admin_referer('vanduong_seeder')) {
        if (! class_exists('WooCommerce')) {
            $notice = '<div class="notice notice-error"><p>' . esc_html__('WooCommerce is niet geactiveerd. Activeer WooCommerce eerst.', 'vanduong') . '</p></div>';
        } elseif ('seed' === $_POST['vanduong_seeder_action']) {
            $r = vanduong_seed_products();
            $notice = '<div class="notice notice-success"><p>' . sprintf(
                esc_html__('Klaar: %1$d producten aangemaakt, %2$d bestaande overgeslagen.', 'vanduong'),
                (int) $r['created'],
                (int) $r['skipped']
            ) . '</p></div>';
        } elseif ('delete' === $_POST['vanduong_seeder_action']) {
            $n = vanduong_delete_seeded_products();
            $notice = '<div class="notice notice-success"><p>' . sprintf(
                esc_html__('%d voorbeeldproducten verwijderd.', 'vanduong'),
                (int) $n
            ) . '</p></div>';
        }
    }

    $count = count(vanduong_sample_products());
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Vanduong productseeder', 'vanduong'); ?></h1>
        <?php echo $notice; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

        <?php if (! class_exists('WooCommerce')) : ?>
            <div class="notice notice-warning"><p><?php esc_html_e('WooCommerce is niet geactiveerd. Activeer WooCommerce om deze functie te gebruiken.', 'vanduong'); ?></p></div>
        <?php endif; ?>

        <p>
            <?php
            printf(
                esc_html__('Maak %d voorbeeldproducten aan (geurkaarsen, keramiek, zeep, decoratie, accessoires) zodat je iets in de winkel kunt bekijken. Veilig om opnieuw uit te voeren — bestaande producten worden overgeslagen. Bij elk product wordt automatisch een afbeelding gedownload.', 'vanduong'),
                (int) $count
            );
            ?>
        </p>

        <form method="post" style="margin-top:1.5rem;display:flex;gap:.75rem;align-items:center;">
            <?php wp_nonce_field('vanduong_seeder'); ?>
            <button type="submit" name="vanduong_seeder_action" value="seed" class="button button-primary">
                <?php printf(esc_html__('%d producten seeden', 'vanduong'), (int) $count); ?>
            </button>
            <button type="submit" name="vanduong_seeder_action" value="delete" class="button button-secondary" onclick="return confirm('<?php echo esc_js(__('Alle voorbeeldproducten verwijderen?', 'vanduong')); ?>');">
                <?php esc_html_e('Voorbeeldproducten verwijderen', 'vanduong'); ?>
            </button>
        </form>
    </div>
    <?php
}
