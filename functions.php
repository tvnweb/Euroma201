<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/menu-walkers.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/protocol-relative-theme-assets.php' );



function custom_post() {
/*Post type: SLIDER*/
  register_post_type( 'slider', /* nome del custom post type */
  // aggiungiamo ora tutte le impostazioni necessarie, in primis definiamo le varie etichette mostrate nei menù
    array('labels' => array(
        'name' => 'Sliders', /* Nome, al plurale, dell'etichetta del post type. */
        'singular_name' => 'Slider', /* Nome, al singolare, dell'etichetta del post type. */
        'all_items' => 'Tutti gli sliders', /* Testo mostrato nei menu che indica tutti i contenuti del post type */
        'add_new' => 'Aggiungi nuovo', /* Il testo per il pulsante Aggiungi. */
        'add_new_item' => 'Aggiungi nuovo slider', /* Testo per il pulsante Aggiungi nuovo post type */
        'edit_item' => 'Modifica Slider', /*  Testo per modifica */
        'new_item' => 'Nuovo Slider' /* Testo per nuovo oggetto */
      ), /* Fine dell'array delle etichette */
        'description' => 'Elenco Slider', /* Una breve descrizione del post type */
        'menu_icon' => get_stylesheet_directory_uri() . '/assets/img/icons/sliders.png', /* Scegli l'icona da usare nel menù per il posty type */
        'public' => true, /* Definisce se il post type sia visibile sia da front-end che da back-end */
        /* la riga successiva definisce quali elementi verranno visualizzati nella schermata di creazione del post */
        'supports' => array( 'title','excerpt', 'custom-fields','sticky')
    ) /* fine delle opzioni */
  ); /* fine della registrazione */

  /*Post type: CLAIM*/
    register_post_type( 'claim', /* nome del custom post type */
    // aggiungiamo ora tutte le impostazioni necessarie, in primis definiamo le varie etichette mostrate nei menù
      array('labels' => array(
          'name' => 'Claims', /* Nome, al plurale, dell'etichetta del post type. */
          'singular_name' => 'Claim', /* Nome, al singolare, dell'etichetta del post type. */
          'all_items' => 'Tutti i Claims', /* Testo mostrato nei menu che indica tutti i contenuti del post type */
          'add_new' => 'Aggiungi nuovo', /* Il testo per il pulsante Aggiungi. */
          'add_new_item' => 'Aggiungi nuovo claim', /* Testo per il pulsante Aggiungi nuovo post type */
          'edit_item' => 'Modifica claim', /*  Testo per modifica */
          'new_item' => 'Nuovo claim' /* Testo per nuovo oggetto */
        ), /* Fine dell'array delle etichette */
          'description' => 'Elenco Claims', /* Una breve descrizione del post type */
          'menu_icon' => get_stylesheet_directory_uri() . '/assets/img/icons/claim.png', /* Scegli l'icona da usare nel menù per il posty type */
          'public' => true, /* Definisce se il post type sia visibile sia da front-end che da back-end */
          /* la riga successiva definisce quali elementi verranno visualizzati nella schermata di creazione del post */
          'supports' => array( 'title','excerpt', 'custom-fields','sticky')
      ) /* fine delle opzioni */
    ); /* fine della registrazione */

    /*Post type: BOTTONI HP*/
      register_post_type( 'link', /* nome del custom post type */
      // aggiungiamo ora tutte le impostazioni necessarie, in primis definiamo le varie etichette mostrate nei menù
        array('labels' => array(
            'name' => 'Link HP', /* Nome, al plurale, dell'etichetta del post type. */
            'singular_name' => 'Link', /* Nome, al singolare, dell'etichetta del post type. */
            'all_items' => 'Tutti i Links', /* Testo mostrato nei menu che indica tutti i contenuti del post type */
            'add_new' => 'Aggiungi nuovo', /* Il testo per il pulsante Aggiungi. */
            'add_new_item' => 'Aggiungi nuovo link', /* Testo per il pulsante Aggiungi nuovo post type */
            'edit_item' => 'Modifica link', /*  Testo per modifica */
            'new_item' => 'Nuovo link' /* Testo per nuovo oggetto */
          ), /* Fine dell'array delle etichette */
            'description' => 'Elenco Links', /* Una breve descrizione del post type */
            'menu_icon' => get_stylesheet_directory_uri() . '/assets/img/icons/link.png', /* Scegli l'icona da usare nel menù per il posty type */
            'public' => true, /* Definisce se il post type sia visibile sia da front-end che da back-end */
            /* la riga successiva definisce quali elementi verranno visualizzati nella schermata di creazione del post */
            'supports' => array( 'title','excerpt', 'custom-fields','sticky')
        ) /* fine delle opzioni */
      ); /* fine della registrazione */


//Rassegna
/*Post type: CLAIM*/
  register_post_type( 'rassegna', /* nome del custom post type */
  // aggiungiamo ora tutte le impostazioni necessarie, in primis definiamo le varie etichette mostrate nei menù
    array('labels' => array(
        'name' => 'Rassegna', /* Nome, al plurale, dell'etichetta del post type. */
        'singular_name' => 'Rassegna', /* Nome, al singolare, dell'etichetta del post type. */
        'all_items' => 'Tutte le Rassegne', /* Testo mostrato nei menu che indica tutti i contenuti del post type */
        'add_new' => 'Aggiungi nuovo', /* Il testo per il pulsante Aggiungi. */
        'add_new_item' => 'Aggiungi una nuova Rassegna', /* Testo per il pulsante Aggiungi nuovo post type */
        'edit_item' => 'Modifica Rassegna', /*  Testo per modifica */
        'new_item' => 'Nuovo Rassegna' /* Testo per nuovo oggetto */
      ), /* Fine dell'array delle etichette */
        'description' => 'Elenco Rassegne', /* Una breve descrizione del post type */
        'menu_icon' => get_stylesheet_directory_uri() . '/assets/img/icons/press.png', /* Scegli l'icona da usare nel menù per il posty type */
        'public' => true, /* Definisce se il post type sia visibile sia da front-end che da back-end */
        /* la riga successiva definisce quali elementi verranno visualizzati nella schermata di creazione del post */
        'supports' => array( 'title','excerpt', 'custom-fields','sticky'),
        'taxonomies' => array('category', 'post_tag')
    ) /* fine delle opzioni */
  ); /* fine della registrazione */







              register_post_type( 'Produce',
          				array(
          						'labels' => array(
          								'name' => __( 'Products' ),
          								'singular_name' => __( 'Product' )
          						),
          						'public' => true,
          						'has_archive' => true,
          						'supports' => array( 'title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail' ),
          						'taxonomies' => array('category', 'post_tag')
          				)
          		);

          		/* POST TYPE NEWS - Salvatore*/
          		register_post_type( 'news',
          			array(
          				'labels' => array(
          					'name' => __( 'News' ),
          					'singular_name' => __( 'News' )
          				),
          			'public' => true,
          			'has_archive' => true,
          			'supports' => array( 'title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail' ),
          			'taxonomies' => array('category', 'post_tag')
          			)
          		);

          //Matti aggiunto customa field Promozioni 20-02-2014//

          		register_post_type( 'promozioni',
          			array(
          				'labels' => array(
          					'name' => __( 'Promozioni' ),
          					'singular_name' => __( 'Promozioni' )
          				),
          			'public' => true,
          			'has_archive' => true,
          			'supports' => array( 'title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail' ),
          			'taxonomies' => array('category', 'post_tag')
          			)
          		);

              register_post_type( 'servizi', /* nome del custom post type */
              // aggiungiamo ora tutte le impostazioni necessarie, in primis definiamo le varie etichette mostrate nei menù
                array('labels' => array(
                    'name' => 'Servizi', /* Nome, al plurale, dell'etichetta del post type. */
                    'singular_name' => 'Servizio', /* Nome, al singolare, dell'etichetta del post type. */
                    'all_items' => 'Tutti i servizi', /* Testo mostrato nei menu che indica tutti i contenuti del post type */
                    'add_new' => 'Aggiungi nuovo', /* Il testo per il pulsante Aggiungi. */
                    'add_new_item' => 'Aggiungi nuovo servizio', /* Testo per il pulsante Aggiungi nuovo post type */
                    'edit_item' => 'Modifica Servizio', /*  Testo per modifica */
                    'new_item' => 'Nuovo Servizio' /* Testo per nuovo oggetto */
                  ), /* Fine dell'array delle etichette */
                    'description' => 'Elenco Servizi', /* Una breve descrizione del post type */
                    'public' => true, /* Definisce se il post type sia visibile sia da front-end che da back-end */
                    /* la riga successiva definisce quali elementi verranno visualizzati nella schermata di creazione del post */
                    'supports' => array( 'title','excerpt', 'custom-fields','sticky')
                ) /* fine delle opzioni */
              ); /* fine della registrazione */

}

// Inizializzazione della funzione
add_action( 'init', 'custom_post');



/* DA VECCHIO TEMA  - PER IDEE REGALO*/

function update_attivo(){
  global $wpdb;
  $query_select="SELECT COUNT(*) FROM wp_ir_user WHERE MD5(CONCAT(nome,cognome,mail))='".$_GET['cc']."'";
  $num=$wpdb->get_var($query_select);
  if($num!=0){
    $query="UPDATE wp_ir_user SET active=1 WHERE MD5(CONCAT(nome,cognome,mail))='".$_GET['cc']."'";
    $wpdb->query($query);
    echo 'l\'account e\' stato attivato con successo';
  }else{
    echo 'il codice inserito non corrisponte a nessun\' account presente';
  }
}


/* GET IMMAGINE PRODOTTO */

function my_get_image_prodotto($id,$dimension=""){
  if($dimension==""){
    $imgTemp=wp_get_attachment_image_src(get_post_meta($id, "immagine_prodotto",true), 'full');
  }else{
    $imgTemp=wp_get_attachment_image_src(get_post_meta($id, "immagine_prodotto",true),array(288,288));
  }


//$arraydimensione = array(288,288);
//		$imgTemp=wp_get_attachment_image_src(get_post_meta($id, "prodotti_dettaglio"));
  return content_url()."/uploads/".basename($imgTemp[0]);
  //return content_url()."/uploads/".basename($imgTemp);
}
/* GET INFORMAZIONI PRODOTTO */
function my_get_info_prodotto($id){
  $arrayReturn = array();
  $content_post = get_post($id);
  $arrayReturn['nome']=apply_filters("the_title",$content_post->post_title);
  $content = $content_post->post_content;
  $content = apply_filters('the_title', $content);
  $content = str_replace(']]>', ']]&gt;', $content);

  $arrayReturn['descrizione']=substr(strip_tags($content),30);
  $arrayReturn['prezzo']=get_post_meta($id, "prezzo",true);
  $imgTemp=wp_get_attachment_image_src(get_post_meta($id, "immagine_prodotto",true));
  $arrayReturn['img']=basename($id);
  $arrayReturn['id']=$id;
  $arrayReturn['permalink']=get_permalink($id);
  $arrayReturn["negozio"]=my_negozio_get(get_post_meta($id, "negozio_id",true));
  $arrayReturn['negozioid']=get_post_meta($id, "negozio_id",true);
  return $arrayReturn;
}

function my_check_userexist($mail){
  global $wpdb;
  $query="SELECT COUNT(*) FROM ".$wpdb->prefix."ir_user WHERE mail='".$mail."'";
  return $wpdb->get_var($query);
}

/* ISCRIZIONE CLIENTE */
add_action('wp_ajax_nopriv_my_registration', 'my_registration_callback');
add_action( 'wp_ajax_my_registration', 'my_registration_callback' );

function my_registration_callback() {
  include("language.php");
  global $wpdb;
  $queryUser="INSERT INTO ".$wpdb->prefix."ir_user (nome,cognome,mail,password,eta,gender,newsletter,active) VALUES (%s,%s,%s,%s,%d,%s,%d,0);";
  $prepare=$wpdb->prepare(
      $queryUser,
      $_POST['nome'],
      $_POST['cognome'],
      $_POST['mail'],
      md5($_POST['password'].AUTH_KEY),
      $_POST['eta'],
      $_POST['gender'],
      $_POST['newsletter']
  );
  if(my_check_userexist($_POST['mail'])>0){
    _e(utf8_encode($lang_mailgiapresente));
    die();
  }
  if($wpdb->query($prepare)){
    //prendo l'ID dell'utente inserito
    $lastId=$wpdb->insert_id;
    //controllo se cookie wishlist temporanee restituisce dei valori
    $q="SELECT count(*) FROM ".$wpdb->prefix."ir_wishlists WHERE nomeuser='".$_COOKIE['guestWL']."'";
    if($wpdb->get_var($q) >0){
      //scrivo le wishlist associandole al cliente UPDATE
      $q_up="UPDATE ".$wpdb->prefix."ir_wishlists SET iduser=".$lastId.", nomeuser='' WHERE nomeuser='".$_COOKIE['guestWL']."' AND iduser=0;";
      $wpdb->query($q_up);
      //cancello il cookie temporaneo
      setcookie('guestWL',false);
    }

    $url_print="";
    if(strpos(get_bloginfo("url"),"?lang=")){
    $url_print=get_bloginfo("url")."&cc=".md5($_POST['nome'].$_POST['cognome'].$_POST['mail']);
    }else{
      $url_print=get_bloginfo("url")."?cc=".md5($_POST['nome'].$_POST['cognome'].$_POST['mail']);
    }

    $content=__(utf8_encode(str_replace("XXX",$_POST['nome'],$lang_mailregistrazione)))."\r\n".$url_print;
    wp_mail($_POST['mail'],__(utf8_encode($lang_iscrizionecompleta_subject)),$content);
    echo __(utf8_encode($lang_iscrizionecompleta));
    die();
  }else{
    echo 'error!';
    die();
  }

}

/* LOGIN */
add_action('wp_ajax_nopriv_my_login', 'my_login_callback');
add_action( 'wp_ajax_my_login', 'my_login_callback' );

function my_login_callback() {
  global $wpdb;

  if (strlen($_POST['mail']) <= 0 or strlen($_POST['password'])<= 0){
    echo '0';
  die();}

  $queryUser="SELECT * FROM ".$wpdb->prefix."ir_user WHERE mail=%s and active=1";
  $prepare=$wpdb->prepare(
      $queryUser,
      $_POST['mail'],
      md5($_POST['password'].AUTH_KEY)
  );


  $user;
  if($user=$wpdb->get_results($prepare)){
    $_SESSION['nome']=$user[0]->nome;
    $_SESSION['cognome']=$user[0]->cognome;
    $_SESSION['id']=$user[0]->id;
    $_SESSION['logged']=1;
    $_SESSION['fblogin']=0;
    echo '1';
    die();
  }else{
    echo '0';
    die();
  }
}

/* LOGOUT */
add_action('wp_ajax_nopriv_my_logout', 'my_logout_callback');
add_action( 'wp_ajax_my_logout', 'my_logout_callback' );

function my_logout_callback() {
  session_start();
  session_destroy();
  die();
}


/* SALVATAGGIO CLIENTE TRAMITE FB */
function my_registration_fb_check_user_callback($user){
  global $wpdb;
  $queryCheckUser="SELECT COUNT(*) FROM ".$wpdb->prefix."ir_user WHERE fbid=%d";
  $prepare=$wpdb->prepare(
      $queryCheckUser,
      $user["id"]
  );
  $num=$wpdb->get_var($prepare);
  return $num;
}
function my_registrazion_fb_get_id_callback($user){
  global $wpdb;
  //$queryCheckUser="SELECT id FROM ".$wpdb->prefix."ir_user WHERE fbid=%s";
  $queryCheckUser="SELECT id FROM ".$wpdb->prefix."ir_user WHERE fbid='".$user['id']."'";

  $prepare=$wpdb->prepare(
      $queryCheckUser,
      $user["id"]
  );//die($queryCheckUser);
  $num=$wpdb->get_var($queryCheckUser);

  return $num;
}
function my_registration_fb_callback($user){
  global $wpdb;

  if(my_registration_fb_check_user_callback($user)==0){
      $queryUser="INSERT INTO ".$wpdb->prefix."ir_user (nome,cognome,mail,password,eta,gender,newsletter,active,fbid) VALUES (%s,%s,%s,%s,%d,%s,%d,1,%s);";
      $mail="";
      $gender="-";
      if(isset($user['email'])){
        $mail=$user['email'];
      }
      switch($user["gender"]){
        case "male":
          $gender="M";
        break;
        case "female":
          $gender="F";
        break;
      }
      $age="";
      if(isset($user['birthday'])){
        $birthDate = $user['birthday'];
        //explode the date to get month, day and year
        $birthDate = explode("/", $birthDate);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
      }
      $prepare=$wpdb->prepare(
          $queryUser,
          $user['first_name'],
          $user['last_name'],
          $mail,
          '',
          $age,
          $gender,
          0,
          $user["id"]
      );
      //die('utente:'.serialize($user).' query: '.serialize($prepare));

      if($wpdb->query($prepare)){

      }else{
        echo 'error!';
        die();
      }
      $_SESSION['nome']=$user['first_name'];
      $_SESSION['cognome']=$user['last_name'];
      $_SESSION['id']=my_registrazion_fb_get_id_callback($user);
      $_SESSION['logged']=1;
      $_SESSION['fblogin']=1;
  }else{
    $_SESSION['nome']=$user['first_name'];
    $_SESSION['cognome']=$user['last_name'];
    $_SESSION['id']=my_registrazion_fb_get_id_callback($user);
    $_SESSION['logged']=1;
    $_SESSION['fblogin']=1;

  }

  //prendo l'ID dell'utente inserito
    $lastId=$_SESSION['id'];
    //controllo se cookie wishlist temporanee restituisce dei valori
    $q="SELECT count(*) FROM ".$wpdb->prefix."ir_wishlists WHERE nomeuser='".$_COOKIE['guestWL']."'";
    if($wpdb->get_var($q) >0){
      //scrivo le wishlist associandole al cliente UPDATE
      $q_up="UPDATE ".$wpdb->prefix."ir_wishlists SET iduser=".$lastId.", nomeuser='' WHERE nomeuser='".$_COOKIE['guestWL']."' AND iduser=0;";
      $wpdb->query($q_up);
      //cancello il cookie temporaneo
      setcookie('guestWL',false);
    }
}

/* GET WISHLISTS*/
function get_wishlistsinfo(){
  global $wpdb;
  $query="SELECT nome FROM ".$wpdb->prefix."ir_wishlists WHERE id=".$_GET['idwishlist'];
  echo strtoupper($wpdb->get_var($query));
}

/* CHECK WISHLIST */
function my_check_wishlist(){
  global $wpdb;
  if($_SESSION['logged']==1){
    $query="SELECT count(*) FROM ".$wpdb->prefix."ir_wishlists WHERE id=".$_GET['idwishlist']." and iduser=".$_SESSION['id'];
    if($wpdb->get_var($query) >0){
      return true;
    }else{ return false;
    }
  }else{
    return false;
  }
}

/* GET WISHLIST */
function getwishlistsobj($id_wish=false){
  global $wpdb;
  $query="SELECT * FROM ".$wpdb->prefix."ir_wishlist WHERE idwishlists=".$_GET['idwishlist']." and attivo=1";
  $arrayReturn = array();
  $obj=$wpdb->get_results($query);
  $i=0;
  foreach($obj as $o){
    if($o->interessi==0) $arrayReturn[$i]['interessi']="-"; else $arrayReturn[$i]['interessi']=$o->interessi;
    $arrayReturn[$i]['prezzomin']=$o->prezzo_min;
    $arrayReturn[$i]['prezzomax']=$o->prezzo_max;
    $arrayReturn[$i]['prodottoid']=$o->prodottoid;
    $arrayReturn[$i]['prodottonome']=$o->prodott_name;
    $arrayReturn[$i]['prezzo']=$o->prezzo;
    $arrayReturn[$i]['negozio']=$o->negozio;
    $arrayReturn[$i]['link']=$o->prodott_name;
    // aggiunta
    $arrayReturn[$i]['categoria']=$o->interessi;
    //fine aggiunta
    $arrayReturn[$i]['id']=$o->id;
    $i++;
  }
  my_update_status_view("wishlists",$_GET['idwishlist']);
  return $arrayReturn;
}

function getsubcategories($id_parent=false){
  if (!$id_parent)
    return false;
  else{
    global $wpdb;
    $query="SELECT * FROM ".$wpdb->prefix."ir_sottocategorie WHERE wp_ir_macro_id=".$id_parent."";
    $arrayReturn = array();
    $obj=$wpdb->get_results($query);
    $i=0;
    foreach($obj as $o){
      $arrayReturn[$i]['id']=$o->id;
      $arrayReturn[$i]['nametag']=$o->nametag;
      $arrayReturn[$i]['originaltag']=$o->prodottoid;
      $i++;
    }
    return $arrayReturn;
  }
}

/* SALVA WISHLISTS */
add_action('wp_ajax_nopriv_my_wishlist', 'my_wishlist_callback');
add_action( 'wp_ajax_my_wishlist', 'my_wishlist_callback' );

function my_wishlist_callback() {

  global $wpdb;

  $idUser=0;
  if(isset($_SESSION['id'])){
    $idUser=$_SESSION['id'];
  }
  $nomeutente=(isset($_COOKIE['guestWL']))?$_COOKIE['guestWL']:$_POST['nomeutente'];
  $queryUser="INSERT INTO ".$wpdb->prefix."ir_wishlists (iduser,nome,nomeuser,eta,genere,creazione,countview,active) VALUES (%d,%s,%s,%d,%s,%s,0,1);";
  $date=date("Y-m-d h:i:s");
  $prepare=$wpdb->prepare(
      $queryUser,
      $idUser,
      $_POST['nome'],
      $nomeutente,
      $_POST['eta'],
      $_POST['genere'],
      $date
  );
  if($wpdb->query($prepare)){
    $query="SELECT id FROM ".$wpdb->prefix."ir_wishlists WHERE iduser=%s and creazione=%s";
    $preparenew=$wpdb->prepare(
        $query,
        $idUser,
        $date
    );

    $num=$wpdb->get_var($preparenew);

    echo $num;
    $_SESSION["id_wish"]=$num;
    die();
  }else{
    echo 'e';
    die();
  }
}

/* GET HOW IS */
function my_gethowis(){
  global $wpdb;
  $query="SELECT * FROM ".$wpdb->prefix."ir_howis ORDER BY id ASC";
  $arrayReturn = array();
  $obj=$wpdb->get_results($query);
  $i=0;
  foreach($obj as $o){
    $arrayReturn[$i]['tipo']=__($o->tipo);
    $arrayReturn[$i]['animale']=$o->animale;
    $i++;
  }
  return $arrayReturn;
}

/* GET TAG CUSTOM POST TYPE */
function my_gettagcustompost($id_post=false){
  global $wpdb;
  $query="SELECT DISTINCT wp_terms.term_id,wp_ir_macrocategorie.nametag as name,wp_ir_macrocategorie.id as id,wp_ir_macrocategorie.originaltag as originaltag
      FROM wp_term_relationships
      JOIN wp_term_taxonomy
      ON wp_term_relationships.term_taxonomy_id=wp_term_taxonomy.term_taxonomy_id
      JOIN wp_terms
      ON wp_term_taxonomy.term_id=wp_terms.term_id
      JOIN wp_posts
      ON wp_term_relationships.object_id=wp_posts.ID
      JOIN wp_ir_macrocategorie
      ON LOWER(wp_ir_macrocategorie.originaltag)=LOWER(wp_terms.name)
      WHERE
      wp_posts.post_type='produce'
      and
      wp_posts.post_status='publish'";
  $query.=($id_post)?" AND wp_posts.ID=".$id_post:"";
  $query.=" ORDER BY wp_ir_macrocategorie.id ASC";
  //wp_terms.name
  $arrayReturn = array();
  $obj=$wpdb->get_results($query);
  $i=0;
  foreach($obj as $o){
    $arrayReturn[$i]['name']=__($o->name);
    $arrayReturn[$i]['termid']=$o->term_id;
    $arrayReturn[$i]['id']=$o->id;
    $arrayReturn[$i]['originaltag']=$o->originaltag;
    $i++;
  }
  return $arrayReturn;
}

/* GET NEGOZIO FROM ID_NEGOZIO */
function my_negozio_get($id){
  global $wpdb;
    $content_post = get_post($id);
    return apply_filters("the_title",$content_post->post_title);
}
function get_negozio_by_id($id){
  global $wpdb;
  return get_post($id);
}

/* GET PRODOTTI */
add_action( 'wp_ajax_nopriv_my_prodotti_search', 'my_prodotti_search_callback');
add_action( 'wp_ajax_my_prodotti_search', 'my_prodotti_search_callback' );

function my_prodotti_search_callback(){
  global $wpdb;
  $query="";
  $queryWhere="";
  if($_POST['categorie']!="" and $_POST['sottocategorie']==""){
    $categorie=substr($_POST['categorie'], 0, strlen($_POST['categorie'])-1);
    $miniquery='';
    $array_categorie=explode(',',$categorie);
    for ($i=0; $i<count($array_categorie);$i++){
      if ($array_categorie[$i]!=',' and $array_categorie[$i]!='')
        $miniquery.="'".$array_categorie[$i]."'";
      if ($i!=count($array_categorie)-1)
        $miniquery.=',';
    }

    $query="SELECT DISTINCT object_id
      FROM wp_term_relationships
      JOIN wp_term_taxonomy
      ON wp_term_relationships.term_taxonomy_id=wp_term_taxonomy.term_taxonomy_id
      JOIN wp_terms
      ON wp_term_taxonomy.term_id=wp_terms.term_id
      JOIN prodotti_pivot
      ON wp_term_relationships.object_id=prodotti_pivot.post_id
      WHERE wp_terms.term_id IN($miniquery) and ";
  }
  else if ($_POST['categorie']=="" and $_POST['sottocategorie']!=""){
  }
  else if ($_POST['categorie']!="" and $_POST['sottocategorie']!=""){
  }
  else{
    $query="SELECT post_id as object_id FROM prodotti_pivot WHERE ";
  }

  //PREZZO
  $priceStart=$_POST['pricestart'];
  $priceEnd=$_POST['pricend'];
  $limit=$_POST['limit'];
  $queryWhere.=" prezzo >= $priceStart and prezzo <= $priceEnd and attivo=1";
  //ETA
  $eta=$_POST['eta'];
  if($eta!=""){
    $eta=substr($eta, 0, strlen($eta)-1);
    $array_eta=explode(',',$eta);
    if (count($array_eta)!=4){ //se non seleziono tutte le voci
      $queryWhere.=" and (";
      for ($i=0; $i<count($array_eta);$i++){
        if ($array_eta[$i]!=',' and $array_eta[$i]!=''){
          $ar_etaminmax=explode('-',$array_eta[$i]);
          if ($ar_etaminmax[1] !='99')
            $queryWhere.=" (min_age>=".$ar_etaminmax[0]." and max_age<=".$ar_etaminmax[1].") ";
          else
            $queryWhere.=" (min_age<=".$ar_etaminmax[0].") ";
        }
        if ($i!=count($array_eta)-1)
          $queryWhere.=' or ';
      }
      $queryWhere.=" )";

    }
  }
  //GENERE
  $genere=$_POST['genere'];
  if($genere!="-"){
    $queryWhere.=" and genere IN(";
    $genere=substr($genere, 0, strlen($genere)-1);

    $array_genere=explode(',',$genere);
    for ($i=0; $i<count($array_genere);$i++){
      if ($array_genere[$i]!=',' and $array_genere[$i]!='')
        $queryWhere.="'".$array_genere[$i]."'";
      if ($i!=count($array_genere)-1)
        $queryWhere.=',';
    }
    $queryWhere.=")";
  }

  $queryWhere.=" ORDER BY RAND() LIMIT ".$limit;
  $query=$query.$queryWhere;
  $arrayReturn = array();
  $obj=$wpdb->get_results($query);
  $i=0;
  foreach($obj as $o){
    $content_post = get_post($o->object_id);
    $arrayReturn[$i]['nome']=apply_filters("the_title",$content_post->post_title);
    $content = $content_post->post_content;
    $content = apply_filters('the_title', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $var = my_gettagcustompost($o->object_id);
          $arrayReturn[$i]['categoria_principale']=$var[0]['name'];
    $arrayReturn[$i]['descrizione']=strip_tags($content);
    $arrayReturn[$i]['prezzo']=get_post_meta($o->object_id, "prezzo",true);
    $imgTemp=wp_get_attachment_image_src(get_post_meta($o->object_id, "immagine_prodotto",true));
    $arrayReturn[$i]['img']=basename($imgTemp[0]);
    $arrayReturn[$i]['id']=$o->object_id;


    $arrayReturn[$i]['link_prod']=get_permalink( $o->object_id);


    $arrayReturn[$i]["negozio"]=my_negozio_get(get_post_meta($o->object_id, "negozio_id",true));
    $arrayReturn[$i]["negozio_link"]=get_permalink(get_post_meta($o->object_id, "negozio_id",true));
    $i++;

  }
  echo json_encode($arrayReturn);
  die();

}

/* SALVA SINGLE WISHTLIST */
add_action('wp_ajax_nopriv_my_wishlist_single', 'my_wishlist_single_callback');
add_action( 'wp_ajax_my_wishlist_single', 'my_wishlist_single_callback' );
function my_wishlist_single_callback(){
  global $wpdb;
  if($_POST['id']!=""){
    //$query="DELETE FROM ".$wpdb->prefix."ir_wishlist WHERE id=".$_POST['id'];
    //$wpdb->query($query);
  }
  $query="INSERT INTO ".$wpdb->prefix."ir_wishlist (idwishlists,interessi,prezzo_min,prezzo_max,prodottoid,attivo) VALUES (%d,%d,%d,%d,%d,1);";
  $date=date("Y-m-d h:i:s");
  $prepare=$wpdb->prepare(
      $query,
      $_POST['wishlist'],
      $_POST['interessi'],
      $_POST['prezzomin'],
      $_POST['prezzomax'],
      $_POST['prodotto']
  );
  if($wpdb->query($prepare)){
    $lastId=$wpdb->insert_id;
    $wpdb->query("INSERT INTO ".$wpdb->prefix."ir_logprodotto (prodottoid,wishogift,genere,eta) VALUES (".$_POST['prodotto'].",'wish','".$_POST['sesso']."','".$_POST['eta']."');");
    $infoProdotto=my_get_info_prodotto($_POST['prodotto']);
    $html='<table class="filtri infoprodotto">
    <tr><th>INTERESSI</th></tr>
    <tr>
    <td>
    <input type="text" class="nome" value="'.$_POST['nome'].'" disabled="disabled"/>
    </td>
    </tr>
    </table>
    <table class="filtri infoprodotto">
    <tr><th style="text-align:center">BUDGET</th></tr>
    <tr>
    <td style="text-align:center">
    <input type="text" class="budget" value="'.$_POST['prezzomin'].'&euro; - '.$_POST['prezzomax'].' &euro;" disabled="disabled" style="text-align:center"/>
    </td>
    </tr>
    </table>
    <table class="filtri infoprodotto" style="width:300px">
    <tr>
    <td style="text-align:center;width:60px">
    <img src="'.my_get_image_prodotto($_POST['prodotto']).'" class="immagine_prodotto" alt="'.$_POST['prodotto'].'"/>
    </td>
    <td><span class="nome_prodotto">'.$infoProdotto['nome'].'</span><br/><span class="nome_negozio" contextmenu="'.$infoProdotto['negozioid'].'">'.$infoProdotto['negozio'].'</span><br/>
    &euro;<b class="prezzo_singolo">'.$infoProdotto['prezzo'].'</b>
    </td>
    </tr>
    </table><input type="hidden" class="idrecord" value="'.$lastId.'">';
    echo $html;
    my_update_status_last("wishlists",$_POST['idwishlists']);
    die();
  }else{
    echo '0';
    die();
  }
}


/* GET WISHLIST */
function my_get_number_prodotti_wish($id){
  global $wpdb;
  $query="SELECT COUNT(*) FROM ".$wpdb->prefix."ir_wishlist WHERE wp_ir_wishlist.idwishlists=$id and attivo=1";
  return $wpdb->get_var($query);
}
function my_get_number_prodotti_totale_wish($id){
  global $wpdb;
  $query=" SELECT SUM(prodotti_pivot.prezzo) FROM prodotti_pivot WHERE prodotti_pivot.post_id IN
  (SELECT wp_ir_wishlist.prodottoid FROM wp_ir_wishlist WHERE wp_ir_wishlist.idwishlists=$id and attivo=1)";
  return $wpdb->get_var($query);
}

function my_get_wishlists($nomeuser=false){
  global $wpdb;

  if (!$nomeuser)
    $query="SELECT * FROM ".$wpdb->prefix."ir_wishlists WHERE active=1 and iduser=".$_SESSION['id'];
  else
    $query="SELECT * FROM ".$wpdb->prefix."ir_wishlists WHERE active=1 and nomeuser='".$nomeuser."'";

  $obj=$wpdb->get_results($query);
  $arrayReturn=array();
  $i=0;
  foreach($obj as $o){
    $arrayReturn[$i]['nome']=strtoupper($o->nome);
    $arrayReturn[$i]['id']=$o->id;
    $arrayReturn[$i]['numprodotti']=my_get_number_prodotti_wish($o->id);
    $arrayReturn[$i]['totale']=my_get_number_prodotti_totale_wish($o->id);
    $i++;
  }
  return $arrayReturn;
}


function my_import_wishlists(){
  global $wpdb;

  $query="UPDATE ".$wpdb->prefix."ir_wishlists SET iduser=".$_SESSION['id'].",nomeuser='' WHERE nomeuser='".$_POST['nomeuser']."' AND iduser=0;";

  $obj=$wpdb->get_results($query);
  $arrayReturn=array();
  $i=0;
  foreach($obj as $o){
    $arrayReturn[$i]['nome']=strtoupper($o->nome);
    $arrayReturn[$i]['id']=$o->id;
    $arrayReturn[$i]['numprodotti']=my_get_number_prodotti_wish($o->id);
    $arrayReturn[$i]['totale']=my_get_number_prodotti_totale_wish($o->id);
    $i++;
  }
  //return $arrayReturn;
  return 'ciao';
}

/* DEACTIVE SINGLE WISHLISTS */
add_action('wp_ajax_nopriv_my_delete_wishlists', 'my_delete_wishlists_callback');
add_action( 'wp_ajax_my_delete_wishlists', 'my_delete_wishlists_callback' );
function my_delete_wishlists_callback(){
  global $wpdb;
  $query="UPDATE ".$wpdb->prefix."ir_wishlists SET active=0 WHERE id=%d;";
  $prepare=$wpdb->prepare(
      $query,
      $_POST['id']
  );
  if($wpdb->query($prepare)){
    my_update_status_last("wishlists",$_POST['id']);
    echo 1;
    die();
  }
}

/* DEACTIVE SINGLE WISHTLIST */

add_action('wp_ajax_nopriv_my_delete_wishlist', 'my_delete_wishlist_callback');
add_action( 'wp_ajax_my_delete_wishlist', 'my_delete_wishlist_callback' );
function my_delete_wishlist_callback(){
  global $wpdb;
  $query="UPDATE ".$wpdb->prefix."ir_wishlist SET attivo=0 WHERE id=%d;";
  $date=date("Y-m-d h:i:s");
  $prepare=$wpdb->prepare(
      $query,
      $_POST['id']
  );
  if($wpdb->query($prepare)){
    my_update_status_last("wishlists",$_POST['idwishlists']);
    echo 1;
    die();
  }
}

function my_update_status_last($table,$id){
  global $wpdb;
  $date=date("Y-m-d h:i:s");
  $query="UPDATE ".$wpdb->prefix."ir_".$table." SET lastedit='".$date."' WHERE id=".$id;
  $wpdb->query($query);
}
function my_update_status_view($table,$id){
  global $wpdb;
  $date=date("Y-m-d h:i:s");
  $query="UPDATE ".$wpdb->prefix."ir_".$table." SET lastview='".$date."' WHERE id=".$id;
  $wpdb->query($query);
}
/* IMPORTO FUNZIONI GIà ESISTENTI (DA RIVEDERE)*/
function wp_corenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 1; //1 - display the text "Page N of N", 0 - not display
  $a['mid_size'] = 5; //how many links to show on the left and right of the current
  $a['end_size'] = 1; //how many links to show in the beginning and end
  $a['prev_text'] = '&laquo; Previous'; //text of the "Previous page" link
  $a['next_text'] = 'Next &raquo;'; //text of the "Next page" link

  if ($max > 1) echo '<div class="navigation">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
}

function my_get_wishlist_value(){
global $wpdb;
$query="SELECT * FROM ".$wpdb->prefix."ir_wishlists WHERE id=".$_GET['idwishlist'];
$result=$wpdb->get_results($query);
foreach($result as $o){
  echo 'var eta="'.$o->eta.'";';
  echo 'var genere="'.$o->genere.'";';
}
}


function navigatore($parent,$arr_categorie,$arr_categorie_ristoranti) {

if($parent==3||$parent==6):
$navigatore='<li '.$arr_categorie[3].' ><a href="?cat=3">'.__('[:it]Tutti i negozi[:en]All shops[:fr]Tous les magasins').'</a></li>
                                          <li '.$arr_categorie[6] .' ><a href="?cat=6">'.get_cat_name( "6" ).'  </a></li>
                                          <li class="offset" '.$arr_categorie[17] .' ><a href="?cat=17">'.get_cat_name( "17" ).'</a></li>
                                          <li class="offset" '.$arr_categorie[16] .' ><a href="?cat=16" >'.get_cat_name( "16" ).'</a></li>
                                          <li class="offset" '.$arr_categorie[15] .' ><a href="?cat=15" >'.get_cat_name( "15" ).'</a></li>
                                          <li class="offset" '.$arr_categorie[14] .' ><a href="?cat=14" >'.get_cat_name( "14" ).'</a></li>

                                          <li class="offset" '.$arr_categorie[13] .' ><a href="?cat=13" >'.get_cat_name( "13" ).'</a></li>
                                          <li class="offset" '.$arr_categorie[25] .' ><a href="?cat=25" >'.get_cat_name( "25" ).'</a></li>
                                          <li class="offset" '.$arr_categorie[18] .' ><a href="?cat=18" >'.get_cat_name( "18" ).'</a></li>

                                      <li '.$arr_categorie[19] .' ><a href="?cat=19" >'.get_cat_name( "19" ).'</a></li>
                                      <li '.$arr_categorie[7] .' ><a href="?cat=7">'.get_cat_name( "7" ).'</a></li>
                                      <li '. $arr_categorie[8] .' ><a href="?cat=8" >'.get_cat_name( "8" ).'</a></li>
                                      <li '. $arr_categorie[9] .' ><a href="?cat=9">'.get_cat_name( "9" ).'</a></li>
                                      <li '. $arr_categorie[11] .' ><a href="?cat=11">'.get_cat_name( "11" ).'</a></li>
                                      <li '. $arr_categorie[12] .' ><a href="?cat=12">'.get_cat_name( "12" ).'</a></li>
                  ';
elseif($parent===0 || $parent==20) :
$navigatore='<li '.$arr_categorie[20].' ><a href="?cat=20">'.get_cat_name( "20" ).'</a></li><li class="offset" '.$arr_categorie[21] .' ><a  href="?cat=21"  >'.get_cat_name( "21" ).'</a></li><li class="offset" '.$arr_categorie[24] .' ><a href="?cat=24">'.get_cat_name( "24" ).'</a></li><li class="offset" '.$arr_categorie[23] .'><a href="?cat=23" >'.get_cat_name( "23" ).'</a></li>';
endif;
return $navigatore;
}

function recupero_immagini() {
//utilizzo il titolo del post per ricavare percorso del logo
 $trans = array("&#038;" => "&","." => "","!" => "","-" => "","’" => "","'" => ""," " => "","ò" => "o");
 $titolo = strtoupper(strtr(get_the_title(), $trans));
                      echo $percorso="wp-content/themes/euroma2/img/negozi_def/".$titolo."/logo.jpg";

}

function curPageURL() {
$pageURL = 'http';
if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
$pageURL .= "://";
if ($_SERVER["SERVER_PORT"] != "80") {
$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
} else {
$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}
return $pageURL;
}

function get_custom_field_value($szKey, $bPrint = false) {
global $post;
$szValue = get_post_meta($post->ID, $szKey, true);
if ( $bPrint == false ) return $szValue; else echo $szValue;
}

add_action('wp_ajax_nopriv_sendMail', 'sendMail');
add_action( 'wp_ajax_sendMail', 'sendMail' );
function sendMail() {
include("language.php");

// RIFACCIO CON PHPMAILER

require "phpmailer/PHPMailerAutoload.php";
$msg = new PHPmailer();
$msg->IsSMTP();
$msg->Host='10.0.4.116';

//$msg->SetFrom('noreply@euroma2.it', 'Centro Commerciale Euroma2');
$msg->SetFrom('noreply@euroma2.it', __(utf8_encode($lang_invioemailcondividi_mittente)));

$msg->AddAddress($_POST['mail']);
$msg->Subject=__(utf8_encode($lang_invioemailcondividi_subject));
//$msg->Body=__(utf8_encode($lang_mailAmico))."\r\n".$_POST['url'];
$msg->Body="http://".$_POST['url'];
//definiamo i comportamenti in caso di invio corretto
//o di errore
if(!$msg->Send()){
  echo $msg->ErrorInfo;
}else{
  echo __(utf8_encode($lang_invioemailcondividi_result));
}

//chiudiamo la connessione
$msg->SmtpClose();
unset($msg);

die();
}

add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
function posts_columns($defaults){
  $defaults['riv_post_thumbs'] = __('Thumbs');
  return $defaults;
}
function posts_custom_columns($column_name, $id){
if($column_name === 'riv_post_thumbs'){
      echo the_post_thumbnail( array(152,86) );
  }
}

?>
