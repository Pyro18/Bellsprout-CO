# Bellsprout-CO
Site for a school assignments for managing a chain of plant stores

# TODO
- [x] where
- [ ] inner join
- [x] left join
- [ ] right join
- [ ] group by
- [ ] having
- [ ] distinct

# LINK UTULI CHE HO USATO PER COMPLETARE IL SITO
- [problema con session](https://stackoverflow.com/questions/4015729/what-is-php-session-start)
- [htmlspecialchars](https://www.php.net/manual/en/function.htmlspecialchars.php) <-- best practice per la sicurezza di quando si stampa un determinato contenuto in un valore html in questo caso mi assicuro che il valore dell'input utente ```($_GET['query'])``` sia correttamente controllato prima di essere inserito nell'HTML. (mi evito un XSS)