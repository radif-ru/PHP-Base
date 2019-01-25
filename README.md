﻿# Базовый курс PHP
Урок 4. Работа с файлами

1. Создать галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит все картинки в уменьшенном виде и форму для загрузки нового изображения. При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно ограничивать с помощью свойства width. При загрузке изображения необходимо делать проверку на тип и размер файла.

2. *При загрузке изображения на сервер должна создаваться его уменьшенная копия, а на странице index.php должны выводиться именно копии. На реальных сайтах это активно используется для экономии трафика. При клике на уменьшенное изображение в браузере в новой вкладке должен открываться оригинал изображения. Функция изменения размера картинок дана в исходниках. Вам необходимо суметь встроить ее в систему.

3. *Создать логирование времени запроса пользователем главной страницы галереи.

4. *Модернизировать логирование так, чтоб последнии данные всегда логировались в файл log.txt. Как только в данном файле будет 10 записей, данные из него должны быть перенесены в файл log1.txt. Если он уже существует - в log2.txt итд.
