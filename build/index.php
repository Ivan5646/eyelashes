<?php
include '/var/lib/blackbox/BlackBox.php';
$config = dirname(__FILE__) . '/../config.php';
BlackBox::init($config);
BlackBox::Lead()->init();

if (!BlackBox::Geo()->isAvailable())
    BlackBox::Geo()->detectGeo(true);

$shortForm = 'false';

if (BlackBox::Lead()->getParam('geo') == 27528) {
    $spbRequisites = [
        'service' => 'ООО "Сервис Косметики" 191025 г. Санкт – Петербург, Невский проспект, д.55, лит.А   ИНН 7841481182',
        'center' => 'ООО «Центр косметики» 197198 Г. Санкт – Петербург, Александровский парк, д. 4, корп. 3, литера А.'
    ];

    BlackBox::bb()->config['geo'][27528]['requisites'] = $spbRequisites[$var = rand(0, 3) ? 'service' : 'center'];
    BlackBox::Lead()->post2session(['advertiser' => $var]);
} elseif (BlackBox::Lead()->getParam('geo') == 27939) {
    $krdRequisites = [
        'KSmsk' => 'ООО "Косметик Сервис" 141008, г.Москва, ул.Сущевский Вал, д.16, стр.3',
        'krd' => 'ООО Счастье, 354000, Краснодарский край, г. Сочи, ул. Горького, дом 75'
    ];

    BlackBox::bb()->config['geo'][27939]['requisites'] = $krdRequisites[$var = rand(0, 1) ? 'krd' : 'KSmsk'];
    BlackBox::Lead()->post2session(['advertiser' => $var]);
} elseif (BlackBox::Lead()->getParam('geo') == 27529) {
    $smrRequisites = [
        'KSmsk' => 'ООО "Косметик Сервис" 141008, г.Москва, ул.Сущевский Вал, д.16, стр.3',
        'smr' => 'ООО "Центр Косметологии" 109147, г.Москва, ул. Сущевский Вал, д. 16, стр. 3'
    ];

    BlackBox::bb()->config['geo'][27529]['requisites'] = $smrRequisites[$var = rand(0, 1) ? 'smr' : 'KSmsk'];
    BlackBox::Lead()->post2session(['advertiser' => $var]);
} elseif (BlackBox::Lead()->getParam('geo') == 36539) {
    $nskRequisites = [
        'KSmsk' => 'ООО «Косметик Сервис" 141008, г.Москва, ул.Сущевский Вал, д.16, стр.3',
        'nsk' => 'ООО «Виктория» 630049, г. Новосибирск, ул. Красный Проспект, дом 182/1, этаж 7'
    ];

    BlackBox::bb()->config['geo'][36539]['requisites'] = $nskRequisites[$var = rand(0, 4) ? 'nsk' : 'KSmsk'];
    BlackBox::Lead()->post2session(['advertiser' => $var]);

}

if (BlackBox::Lead()->getParam('geo') == 41352) {
    $pretextIn = 'во';
} else{
    $pretextIn = 'в';
};

$inCity = BlackBox::Geo()->isAvailable() ? ' ' .$pretextIn .' ' . BlackBox::Geo()->geoInflect(5) : '';
$fromCity = BlackBox::Geo()->isAvailable() ? ' из ' . BlackBox::Geo()->geoInflect(1) : '';

$monthAr = array(
    1 => array('январь', 'января'),
    2 => array('февраль', 'февраля'),
    3 => array('март', 'марта'),
    4 => array('апрель', 'апреля'),
    5 => array('май', 'мая'),
    6 => array('июнь', 'июня'),
    7 => array('июль', 'июля'),
    8 => array('август', 'августа'),
    9 => array('сентябрь', 'сентября'),
    10 => array('октябрь', 'октября'),
    11 => array('ноябрь', 'ноября'),
    12 => array('декабрь', 'декабря')
);
$date = new DateTime(date('d-m-Y'));
$date->add(new DateInterval('P12D'));
$inDate = $date->format('j') . " " . $monthAr[$date->format('n')][1];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eyelashes</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
	<link rel="stylesheet" href="styles/main.css">
	<link rel="stylesheet" href="styles/vendors/owl-carousel.min.css">
	<link rel="stylesheet" href="styles/blocks/header.css">
	<link rel="stylesheet" href="styles/blocks/apply.css">
	<link rel="stylesheet" href="styles/blocks/description.css">
	<link rel="stylesheet" href="styles/blocks/feature.css">
	<link rel="stylesheet" href="styles/blocks/use.css">
	<link rel="stylesheet" href="styles/blocks/result.css">
	<link rel="stylesheet" href="styles/blocks/reviews.css"> 
	<link rel="stylesheet" href="styles/blocks/delivery.css">
	<link rel="stylesheet" href="styles/blocks/order.css">
	<link rel="stylesheet" href="styles/blocks/footer.css">
</head>	

<body>

<div class="header">
	<div class="container">
		<div class="header_logo">
			<h1>Platinum</h1>
			<p>Раствор для роста бровей и ресниц</p>
		</div>
		<div class="header_bottom">
			<form class="apply" action="../send.php" method="post" onsubmit="validateform(this); return false;">
				<div class="apply_promo">
					<div>До конца <br> <span>акции</span></div>
					<div class="apply_time" id="time"></div>
				</div>
				<div class="apply_wrap">
					<div class="apply_price">
						<div class="apply_noDiscount">
							<div>Обычнная цена</div>
							<div class="apply_figure">1980 руб</div>
						</div>
						<div class="apply_discount">
							<div>Цена со скидкой</div>
							<div class="apply_figure">990 руб</div>
						</div>
					</div>
					<input type="text" name="country" placeholder="Страна" required>
					<input type="text" name="name" placeholder="ФИО" required>
					<input type="tel" name="phone" placeholder="Номер телефона" required>
					<button class="btn" type="submit">Заказать со скидкой 50%</button>
				</div>
			</form>
			<div class="header_result">
				<p>Вы будете шокированы <br>результатом</p>
				<p>Видимый эффект за короткий срок</p>
				<p>Увеличение длинны и <br>объема в 2 раза</p>
				<div class="header_product-img"></div>
			</div>			
		</div>
	</div>
</div>

<div class="description">
	<div class="container">
		<h2>Как работает PLATINUM?!</h2>
		<div class="description_wrap">
			<div class="feature">
				<div class="feature_header">Биокомплекс экстрактов хвойных растений</div>
				<div class="feature_content feature_content--pine">
					Укрепляет луковицс ресниц, предотвращяет их выпадение, способствует заживлению микроцарапин и делает кожу вокруг глаз бархатистой, укрепляет стенки каппиляров и сосудов.
				</div>
			</div>
			<div class="feature feature--acid">
				<div class="feature_header feature_header--acid">Гуминовые кислоты</div>
				<div class="feature_content feature_content--acid">
					Уникальные биогенные стимуляторы роста волос восстанавливают и улучшают структуру волоса, оказывают противоаллергический эффект.
				</div>
			</div>
			<div class="feature feature--gel">
				<div class="feature_header">Генерирующий гель VOM</div>
				<div class="feature_content feature_content--gel">
					Быстро проникает в кожу, структуриреут клетки, оказывает абсорбирующее действие с антимикробным действием. 
				</div>
			</div>
			<div class="feature feature--oil">
				<div class="feature_header">Касторовое масло</div>
				<div class="feature_content feature_content--oil">
					Ускоряет рост ресниц, делает их более густыми, длинными и сильными.
				</div>
			</div>
		</div>
	</div>
</div>

<div class="use">
	<h2>Как применять раствор для максимального роста ресниц и бровей</h2>
	<div class="container">
		<ol class="use_instruction">
			<li>Внимание! Не наносите раствор на ресницы после слез! Раствор не впитается.</li>
			<li>Утром и ночью на чистую кожу и ресницы</li>
			<li>Ощутите эффект даже при нерегулярном применении!</li>
		</ol>
		<div class="use_natural"></div>
		<div class="use_platinum"></div>
	</div>
</div>

<div class="result">
	<div class="container">
		<div class="result_img"></div>
		<div class="result_description">
			<h2>Результат:</h2>
			<div class="result_wrap">
				<ul class="result_top-list">
					<li>Максимальная густота и длина ресниц</li>
					<li>Реальное увеличение бровей</li>
					<li>Здоровые глазки и никакой аллергии</li>
				</ul>
				<div class="result_regular">
					<h3>При регулярном использовании:</h3>
					<ul class="result_bottom-list">
						<li>снижается усталость, напряжение и отечность глаз</li>
						<li>питание и восстановление рениц и бровей</li>
						<li>рост и укрепление</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="reviews">
	<h2 class="block-header">Отзывы покупателей</h2>
	<div class="container">
		<div class="reviews_wrapper owl-carousel">
			<div class="slide">
				<h3 class="reviews_padding">Оля Меньшова, 24 года</h3>
				<div class="reviews_img">
					<div class="reviews_client-img reviews_client-img--first"></div>
					<div class="reviews_client-img reviews_client-img--second"></div>
					<div class="reviews_client-img reviews_client-img--third"></div>
				</div>
				<div class="reviews_text">После лактации начали выпадать ресницы. Сначала не обращала внимания, когда веки облысели начала бить тревогу. Пробовалаа маслами укреплять - не помогало. Потом в интернете нашла Платинум, почитала отзывы и заказала. Применяла утром и вечером. Результатом более чем довольна, фото до и после.</div>
			</div>
			<div class="slide">
				<h3>Марина Алферова, 20 лет</h3>
				<div class="reviews_img reviews_img--marina">
					<div class="reviews_client-img"></div>
					<div class="reviews_client-img"></div>
					<div class="reviews_client-img"></div>
				</div>
				<div class="reviews_text">Сейчас в моде красивые густые брови, а я много лет не могла отрастить свои. С таким ужасным лицом стыдно в универ было ходить. Косметолог посоветовал этот раствор наносить утром и вечером - и вуа-ля, буквально за несколько недель я преобразилась.Цена студенческая ) Перемены мне к лицу. правда?</div>
			</div>
			<div class="slide">
				<h3>Ксюша Митрофанова, 30 лет</h3>
				<div class="reviews_img reviews_img--ksyusha">
					<div class="reviews_client-img"></div>
					<div class="reviews_client-img"></div>
					<div class="reviews_client-img"></div>
				</div>
				<div class="reviews_text">После наращивания ресниц состояние родных безумно ухудшилось. Решила восстановить, перепробовала кучу дорогущих средств - еще хуже стало. Аллергия началась, глаза оупхли. Опираясь на отзывы и приятную цену раствора Платинус решила заказать. Эффектом довольна, ресничики длинные и густые. Советую!</div>
			</div>
		</div>
	</div>
</div>

<div class="delivery">
	<h2 class="block-header">Доставка и оплата</h2>
	<div class="container">
		<div class="delivery_condition delivery_condition--truck">Доставка Magent Lashes возможна почтой и курьером. Оставьте заявку и оператор расскажет какая доставка будет удобна именно для Вас.</div>
		<div class="delivery_condition delivery_condition--money">Мы не прнимаем предоплату. Оплата производится только при получении товара!</div>
		<div class="delivery_condition delivery_condition--refund">Вы вправе отказаться от покупки в течение 14 дней с момента получения товара, независимо от причины возврата</div>
	</div>
</div>

<div class="order">
	<div class="container">
		<div class="order_form">
			<h2>Закажите PLATINUM по рекордно низкой цене!</h2>
			<form class="apply" action="../send.php" method="post" onsubmit="validateform(this); return false;">
				<div class="apply_promo">
					<div>До конца <br> <span>акции</span></div>
					<div class="apply_time" id="time2"></div>
				</div>
				<div class="apply_wrap">
					<div class="apply_price">
						<div class="apply_noDiscount">
							<div>Обычнная цена</div>
							<div class="apply_figure">1980 руб</div>
						</div>
						<div class="apply_discount">
							<div>Цена со скидкой</div>
							<div class="apply_figure">990 руб</div>
						</div>
					</div>
					<input type="text" name="country" placeholder="Страна" required>
					<input type="text" name="name" placeholder="ФИО" required>
					<input type="tel" name="phone" placeholder="Номер телефона" required>
					<button class="btn" type="submit">Заказать со скидкой 50%</button>
				</div>
			</form>
		</div>
		<div class="order_product"></div>
	</div>
</div>

<footer class="footer">
    <div class="container">
        <div class="footer_line"></div>
        <p><?=BlackBox::geo()->legal()?></p>
        <p><a href="../politika.php" class="politika" modal="polit">Политика конфиденциальности</a></p>
    </div>
</footer>

<script src="//ajax.ɡooɡleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/vendors/owl-carousel.min.js"></script>
<script src="js/vendors/jquery.countdown.min.js"></script>
<script src="js/all.js"></script>

<script>
    function validateform(form) {
        if (form.elements["name"].value == "") {
            alert("Please, enter your full name");
            return false;
        }
        if (form.elements["name"].value.length < 2) {
            alert("Please, enter your full name");
            return false;
        }
        var phone_reg = new RegExp('[A-z А-я]', 'g');
        var literInPhone = phone_reg.test(form.elements["phone"].value);
        if (form.elements["phone"].value == "") {
            alert("Please, enter your phone number");
            return false;
        }
        if (literInPhone) {
            alert("Please, enter your phone number");
            return false;
        }
        if (form.elements["phone"].value.length < 9) {
            alert("Please, enter your phone number");
            return false;
        }
        form.querySelector(".btn").setAttribute("disabled", true);
        form.submit();
    }
</script>


</body>
</html>