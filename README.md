**Тестовое задание для Work5.**

**1. PHP**

Аутентификация/регистрация на главной странице.
База данных в корне (work5.sql)

Задание:
_Создать страницу с авторизацией пользователя: логин и пароль и реализовать в ней:
 возможность регистрации пользователя (email, логин, пароль, ФИО),
 при входе в "личный кабинет" возможность сменить пароль и ФИО.
 использовать "чистый" PHP 5.6 и выше (без фреймворков) и MySQL 5.5 и выше, дизайн не важен, верстка тоже простая. Наворотов не нужно, хотим посмотреть просто Ваш код._
 
 **2. SQL**
 
Задание:
 _Есть 2 таблицы. Таблица пользователей:
  users
  ----------
  `id` int(11)
  `email` varchar(55)
  `login` varchar(55)
  
  и таблица заказов
  orders
  --------
  `id` int(11)
  `user_id` int(11)
  `price` int(11)
  
  Необходимо:
  1. Составить запрос, который выведет список email'лов встречающихся более чем у одного пользователя
  2. Вывести список логинов пользователей, которые не сделали ни одного заказа
  3. Вывести список логинов пользователей которые сделали более двух заказов._
  
  **Ответы:**
База данных находится в папке **/part2 (work5_2.sql)**. 

1. `SELECT
        *
    FROM
        users
    WHERE
        email IN(
        SELECT
            email
        FROM
            users
        GROUP BY
            email
        HAVING
            COUNT(*) > 1
    )
    ORDER BY
        email` 
        
2. `SELECT
        u.login
    FROM
        users u
    LEFT JOIN orders o ON
        u.id = o.user_id
    WHERE
        o.user_id IS NULL`
        
3. `SELECT
        u.login,
        COUNT(o.user_id) AS count_orders
    FROM
        users u
    INNER JOIN orders o ON
        u.id = o.user_id
    GROUP BY
        u.id
    HAVING
        COUNT(o.user_id) >= 2
    ORDER BY
        count_orders`        