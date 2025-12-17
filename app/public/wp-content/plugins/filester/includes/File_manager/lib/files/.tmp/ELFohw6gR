<?php
/*
Plugin Name: OneRoyal UTM Builder
Description: Admin UTM URL Builder for OneRoyal with editable select options.
Author: OneRoyal
Version: 1.2
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class OneRoyal_UTM_Builder {

    const OPTION_KEY = 'or_utm_builder_config';

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );
        register_activation_hook( __FILE__, array( $this, 'on_activate' ) );
    }

    public function on_activate() {
        $defaults = $this->get_default_config();
        $current  = get_option( self::OPTION_KEY, array() );
        if ( empty( $current ) ) {
            add_option( self::OPTION_KEY, $defaults );
        } else {
            $merged = wp_parse_args( $current, $defaults );
            update_option( self::OPTION_KEY, $merged );
        }
    }

    public function get_default_config() {
        return array(
            'sources'   => "Facebook|facebook\nGoogle|google\nInstagram|instagram\nLinkedIn|linkedin\nTwitter|twitter\nYouTube|youtube\nEmail|email",
            'mediums'   => "CPC|cpc\nSocial|social\nEmail|email\nDisplay|display\nMedia-Buy|media-buy\nOrganic|organic\nReferral|referral",
            'countries' => <<<ORCOUNTRIES
Afghanistan|af
Albania|al
Algeria|dz
Andorra|ad
Angola|ao
Antigua and Barbuda|ag
Argentina|ar
Armenia|am
Australia|au
Austria|at
Azerbaijan|az
Bahamas|bs
Bahrain|bh
Bangladesh|bd
Barbados|bb
Belarus|by
Belgium|be
Belize|bz
Benin|bj
Bhutan|bt
Bolivia|bo
Bosnia and Herzegovina|ba
Botswana|bw
Brazil|br
Brunei|bn
Bulgaria|bg
Burkina Faso|bf
Burundi|bi
Cambodia|kh
Cameroon|cm
Canada|ca
Cape Verde|cv
Central African Republic|cf
Chad|td
Chile|cl
China|cn
Colombia|co
Comoros|km
Democratic Republic of the Congo|cd
Republic of the Congo|cg
Costa Rica|cr
Côte d’Ivoire|ci
Croatia|hr
Cuba|cu
Cyprus|cy
Czech Republic|cz
Denmark|dk
Djibouti|dj
Dominica|dm
Dominican Republic|do
Ecuador|ec
Egypt|eg
El Salvador|sv
Equatorial Guinea|gq
Eritrea|er
Estonia|ee
Eswatini|sz
Ethiopia|et
Fiji|fj
Finland|fi
France|fr
Gabon|ga
Gambia|gm
Georgia|ge
Germany|de
Ghana|gh
Greece|gr
Grenada|gd
Guatemala|gt
Guinea|gn
Guinea-Bissau|gw
Guyana|gy
Haiti|ht
Honduras|hn
Hungary|hu
Iceland|is
India|in
Indonesia|id
Iran|ir
Iraq|iq
Ireland|ie
Israel|il
Italy|it
Jamaica|jm
Japan|jp
Jordan|jo
Kazakhstan|kz
Kenya|ke
Kiribati|ki
North Korea|kp
South Korea|kr
Kuwait|kw
Kyrgyzstan|kg
Laos|la
Latvia|lv
Lebanon|lb
Lesotho|ls
Liberia|lr
Libya|ly
Liechtenstein|li
Lithuania|lt
Luxembourg|lu
Madagascar|mg
Malawi|mw
Malaysia|my
Maldives|mv
Mali|ml
Malta|mt
Marshall Islands|mh
Mauritania|mr
Mauritius|mu
Mexico|mx
Micronesia|fm
Moldova|md
Monaco|mc
Mongolia|mn
Montenegro|me
Morocco|ma
Mozambique|mz
Myanmar|mm
Namibia|na
Nauru|nr
Nepal|np
Netherlands|nl
New Zealand|nz
Nicaragua|ni
Niger|ne
Nigeria|ng
North Macedonia|mk
Norway|no
Oman|om
Pakistan|pk
Palau|pw
Panama|pa
Papua New Guinea|pg
Paraguay|py
Peru|pe
Philippines|ph
Poland|pl
Portugal|pt
Qatar|qa
Romania|ro
Russia|ru
Rwanda|rw
Saint Kitts and Nevis|kn
Saint Lucia|lc
Saint Vincent and the Grenadines|vc
Samoa|ws
San Marino|sm
Sao Tome and Principe|st
Saudi Arabia|sa
Senegal|sn
Serbia|rs
Seychelles|sc
Sierra Leone|sl
Singapore|sg
Slovakia|sk
Slovenia|si
Solomon Islands|sb
Somalia|so
South Africa|za
South Sudan|ss
Spain|es
Sri Lanka|lk
Sudan|sd
Suriname|sr
Sweden|se
Switzerland|ch
Syria|sy
Taiwan|tw
Tajikistan|tj
Tanzania|tz
Thailand|th
Timor-Leste|tl
Togo|tg
Tonga|to
Trinidad and Tobago|tt
Tunisia|tn
Turkey|tr
Turkmenistan|tm
Tuvalu|tv
Uganda|ug
Ukraine|ua
United Arab Emirates|ae
United Kingdom|uk
United States|us
Uruguay|uy
Uzbekistan|uz
Vanuatu|vu
Vatican City|va
Venezuela|ve
Vietnam|vn
Yemen|ye
Zambia|zm
Zimbabwe|zw
ORCOUNTRIES,
            'languages' => <<<ORLANGUAGES
Afar|aa
Abkhazian|ab
Avestan|ae
Afrikaans|af
Akan|ak
Amharic|am
Aragonese|an
Arabic|ar
Assamese|as
Avaric|av
Aymara|ay
Azerbaijani|az
Bashkir|ba
Belarusian|be
Bulgarian|bg
Bihari languages|bh
Bislama|bi
Bambara|bm
Bengali|bn
Tibetan|bo
Breton|br
Bosnian|bs
Catalan|ca
Chechen|ce
Chamorro|ch
Corsican|co
Cree|cr
Czech|cs
Church Slavic|cu
Chuvash|cv
Welsh|cy
Danish|da
German|de
Divehi|dv
Dzongkha|dz
Ewe|ee
Greek|el
English|en
Esperanto|eo
Spanish|es
Estonian|et
Basque|eu
Persian|fa
Fulah|ff
Finnish|fi
Fijian|fj
Faroese|fo
French|fr
Western Frisian|fy
Irish|ga
Scottish Gaelic|gd
Galician|gl
Guaraní|gn
Gujarati|gu
Manx|gv
Hausa|ha
Hebrew|he
Hindi|hi
Hiri Motu|ho
Croatian|hr
Haitian Creole|ht
Hungarian|hu
Armenian|hy
Herero|hz
Interlingua|ia
Indonesian|id
Interlingue|ie
Igbo|ig
Nuosu|ii
Inupiaq|ik
Ido|io
Icelandic|is
Italian|it
Inuktitut|iu
Japanese|ja
Javanese|jv
Georgian|ka
Kongo|kg
Kikuyu|ki
Kuanyama|kj
Kazakh|kk
Kalaallisut|kl
Khmer|km
Kannada|kn
Korean|ko
Kanuri|kr
Kashmiri|ks
Kurdish|ku
Komi|kv
Cornish|kw
Kyrgyz|ky
Latin|la
Luxembourgish|lb
Ganda|lg
Limburgish|li
Lingala|ln
Lao|lo
Lithuanian|lt
Luba-Katanga|lu
Latvian|lv
Malagasy|mg
Marshallese|mh
Māori|mi
Macedonian|mk
Malayalam|ml
Mongolian|mn
Marathi|mr
Malay|ms
Maltese|mt
Burmese|my
Nauru|na
Norwegian Bokmål|nb
North Ndebele|nd
Nepali|ne
Ndonga|ng
Dutch|nl
Norwegian Nynorsk|nn
Norwegian|no
South Ndebele|nr
Navajo|nv
Chichewa|ny
Occitan|oc
Ojibwe|oj
Oromo|om
Odia|or
Ossetian|os
Punjabi|pa
Pali|pi
Polish|pl
Pashto|ps
Portuguese|pt
Quechua|qu
Romansh|rm
Kirundi|rn
Romanian|ro
Russian|ru
Kinyarwanda|rw
Sanskrit|sa
Sardinian|sc
Sindhi|sd
Northern Sami|se
Sango|sg
Sinhala|si
Slovak|sk
Slovenian|sl
Samoan|sm
Shona|sn
Somali|so
Albanian|sq
Serbian|sr
Swati|ss
Southern Sotho|st
Sundanese|su
Swedish|sv
Swahili|sw
Tamil|ta
Telugu|te
Tajik|tg
Thai|th
Tigrinya|ti
Turkmen|tk
Tagalog|tl
Tswana|tn
Tongan|to
Turkish|tr
Tsonga|ts
Tatar|tt
Twi|tw
Tahitian|ty
Uyghur|ug
Ukrainian|uk
Urdu|ur
Uzbek|uz
Venda|ve
Vietnamese|vi
Volapük|vo
Walloon|wa
Wolof|wo
Xhosa|xh
Yiddish|yi
Yoruba|yo
Zhuang|za
Chinese|zh
Zulu|zu
ORLANGUAGES,
            'themes'    => "Forex Trading|forex-trading\nCrypto Trading|crypto-trading\nCommodities|commodities\nIndices|indices\nShares|shares\nNew Traders|new-traders\nProfessional Traders|professional\nBonus Offer|bonus-offer",
        );
    }

    public function register_settings() {
        register_setting(
            'or_utm_builder_settings_group',
            self::OPTION_KEY,
            array(
                'type'              => 'array',
                'sanitize_callback' => array( $this, 'sanitize_config' ),
                'default'           => $this->get_default_config(),
            )
        );
    }

    public function sanitize_config( $input ) {
        $defaults = $this->get_default_config();
        $output   = array();

        foreach ( $defaults as $key => $default_val ) {
            if ( isset( $input[ $key ] ) ) {
                $output[ $key ] = sanitize_textarea_field( $input[ $key ] );
            } else {
                $output[ $key ] = $default_val;
            }
        }

        return $output;
    }

    public function add_menu_page() {
        add_menu_page(
            'UTM Builder',
            'UTM Builder',
            'manage_options',
            'or-utm-builder',
            array( $this, 'render_page' ),
            'dashicons-admin-links',
            80
        );
    }

    private function parse_options_lines( $text ) {
        $lines   = preg_split( '/\r\n|\r|\n/', $text );
        $options = array();

        foreach ( $lines as $line ) {
            $line = trim( $line );
            if ( $line === '' ) {
                continue;
            }

            $parts = explode( '|', $line, 2 );
            $label = trim( $parts[0] );
            $value = isset( $parts[1] ) ? trim( $parts[1] ) : sanitize_title( $label );

            if ( $label !== '' ) {
                $options[] = array(
                    'label' => $label,
                    'value' => $value,
                );
            }
        }

        return $options;
    }

    public function render_page() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        $config = get_option( self::OPTION_KEY, $this->get_default_config() );
        $config = wp_parse_args( $config, $this->get_default_config() );

        $sources   = $this->parse_options_lines( $config['sources'] );
        $mediums   = $this->parse_options_lines( $config['mediums'] );
        $countries = $this->parse_options_lines( $config['countries'] );
        $languages = $this->parse_options_lines( $config['languages'] );
        $themes    = $this->parse_options_lines( $config['themes'] );
        ?>
        <div class="wrap">
            <h1>OneRoyal UTM Builder</h1>

            <p>Use this page to configure the select options and build OneRoyal UTM URLs for your campaigns.</p>

            <hr>

            <h2>Configuration: Select Options</h2>
            <p>
                Format: one option per line, <code>Label|value</code>.  
                If <code>|value</code> is omitted, the value will be generated from the label.
            </p>

            <form method="post" action="options.php" style="margin-bottom: 30px;">
                <?php
                settings_fields( 'or_utm_builder_settings_group' );
                ?>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><label for="or_utm_sources">Sources</label></th>
                        <td>
                            <textarea id="or_utm_sources" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[sources]" rows="6" cols="60"><?php echo esc_textarea( $config['sources'] ); ?></textarea>
                            <p class="description">One per line. Example: <code>Facebook|facebook</code></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="or_utm_mediums">UTM Mediums</label></th>
                        <td>
                            <textarea id="or_utm_mediums" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[mediums]" rows="6" cols="60"><?php echo esc_textarea( $config['mediums'] ); ?></textarea>
                            <p class="description">One per line. Example: <code>CPC|cpc</code></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="or_utm_countries">Countries</label></th>
                        <td>
                            <textarea id="or_utm_countries" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[countries]" rows="8" cols="60"><?php echo esc_textarea( $config['countries'] ); ?></textarea>
                            <p class="description">One per line. Example: <code>Cyprus|cy</code>.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="or_utm_languages">Languages</label></th>
                        <td>
                            <textarea id="or_utm_languages" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[languages]" rows="8" cols="60"><?php echo esc_textarea( $config['languages'] ); ?></textarea>
                            <p class="description">One per line. Example: <code>English|en</code>.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="or_utm_themes">Campaign Themes</label></th>
                        <td>
                            <textarea id="or_utm_themes" name="<?php echo esc_attr( self::OPTION_KEY ); ?>[themes]" rows="6" cols="60"><?php echo esc_textarea( $config['themes'] ); ?></textarea>
                            <p class="description">One per line. Example: <code>Forex Trading|forex-trading</code></p>
                        </td>
                    </tr>
                </table>

                <?php submit_button( 'Save Select Options' ); ?>
            </form>

            <hr>

            <h2>UTM Builder</h2>
            <p>Fill in the fields below to generate a OneRoyal tracking URL.</p>

            <div id="or_utm_message" style="margin:10px 0;font-size:14px;"></div>

            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="or_website">Website URL</label></th>
                    <td>
                        <input type="url" id="or_website" class="regular-text" value="https://www.oneroyal.com/en/">
                        <p class="description">Base URL for your OneRoyal campaign (e.g., <code>https://www.oneroyal.com/en/</code>).</p>
                    </td>
                </tr>

                <tr>
                    <th scope="row">Campaign Name Modifiers</th>
                    <td>
                        <p>
                            <label for="or_source_modifier"><strong>Source Modifier</strong></label><br>
                            <select id="or_source_modifier">
                                <option value="">— Select Source —</option>
                                <?php foreach ( $sources as $opt ) : ?>
                                    <option value="<?php echo esc_attr( $opt['value'] ); ?>"><?php echo esc_html( $opt['label'] ); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </p>

                        <p>
                            <label for="or_medium_modifier"><strong>UTM Medium*</strong></label><br>
                            <select id="or_medium_modifier">
                                <option value="">— Select UTM Medium —</option>
                                <?php foreach ( $mediums as $opt ) : ?>
                                    <option value="<?php echo esc_attr( $opt['value'] ); ?>"><?php echo esc_html( $opt['label'] ); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </p>

                        <p>
                            <label for="or_country_modifier"><strong>Country Modifier</strong></label><br>
                            <select id="or_country_modifier">
                                <option value="">— Select Country —</option>
                                <?php foreach ( $countries as $opt ) : ?>
                                    <option value="<?php echo esc_attr( $opt['value'] ); ?>"><?php echo esc_html( $opt['label'] ); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </p>

                        <p>
                            <label for="or_language_modifier"><strong>Language Modifier</strong></label><br>
                            <select id="or_language_modifier">
                                <option value="">— Select Language —</option>
                                <?php foreach ( $languages as $opt ) : ?>
                                    <option value="<?php echo esc_attr( $opt['value'] ); ?>"><?php echo esc_html( $opt['label'] ); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </p>

                        <p>
                            <label for="or_theme_modifier"><strong>Campaign Theme</strong></label><br>
                            <select id="or_theme_modifier">
                                <option value="">— Select Campaign Theme —</option>
                                <?php foreach ( $themes as $opt ) : ?>
                                    <option value="<?php echo esc_attr( $opt['value'] ); ?>"><?php echo esc_html( $opt['label'] ); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </p>

                        <p>
                            <label for="or_campaign_name"><strong>Campaign Name</strong></label><br>
                            <input type="text" id="or_campaign_name" class="regular-text" readonly placeholder="Generated Campaign Name">
                        </p>
                    </td>
                </tr>

                <tr>
                    <th scope="row">URL UTM Modifiers</th>
                    <td>
                        <p>
                            <label for="or_utm_source"><strong>Campaign ID and/or AdSet ID (optional)</strong></label><br>
                            <input type="text" id="or_utm_source" class="regular-text" placeholder="CID-xxxxxxxxxxxxxxxxxx,AID-xxxxxxxxxxxxxxxxxxx">
                            <span class="description">Optional. If provided, start with <code>CID-{campaignid}</code> and/or <code>AID-{adsetid}</code>.</span>
                        </p>

                        <p>
                            <label for="or_utm_medium"><strong>UTM Medium*</strong></label><br>
                            <input type="text" id="or_utm_medium" class="regular-text" placeholder="Derived from above" readonly>
                        </p>

                        <p>
                            <label for="or_utm_term"><strong>UTM Term</strong></label><br>
                            <input type="text" id="or_utm_term" class="regular-text" placeholder="Keywords or Audience info - {keyword}">
                        </p>

                        <p>
                            <label for="or_utm_content"><strong>UTM Content</strong></label><br>
                            <input type="text" id="or_utm_content" class="regular-text" placeholder="Landing Page Title">
                        </p>
                    </td>
                </tr>

                <tr>
                    <th scope="row">Generate Campaign ID</th>
                    <td>
                        <button type="button" class="button button-secondary" id="or_generate_btn">
                            Generate Campaign ID
                        </button>
                    </td>
                </tr>

                <tr>
                    <th scope="row">Build URL</th>
                    <td>
                        <button type="button" class="button button-primary" id="or_build_btn">
                            Build OneRoyal URL
                        </button>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="or_utm_result">Generated OneRoyal URL</label></th>
                    <td>
                        <textarea id="or_utm_result" rows="4" cols="80" readonly></textarea><br>
                        <button type="button" class="button" id="or_copy_btn">Copy URL</button>
                    </td>
                </tr>
            </table>

            <script>
            (function(){
                document.addEventListener('DOMContentLoaded', function(){
                    var website    = document.getElementById('or_website');
                    var srcMod     = document.getElementById('or_source_modifier');
                    var medMod     = document.getElementById('or_medium_modifier');
                    var countryMod = document.getElementById('or_country_modifier');
                    var langMod    = document.getElementById('or_language_modifier');
                    var themeMod   = document.getElementById('or_theme_modifier');

                    var campName   = document.getElementById('or_campaign_name');
                    var utmSource  = document.getElementById('or_utm_source');
                    var utmMedium  = document.getElementById('or_utm_medium');
                    var utmTerm    = document.getElementById('or_utm_term');
                    var utmContent = document.getElementById('or_utm_content');
                    var utmResult  = document.getElementById('or_utm_result');

                    var msgBox     = document.getElementById('or_utm_message');

                    var generateBtn = document.getElementById('or_generate_btn');
                    var buildBtn    = document.getElementById('or_build_btn');
                    var copyBtn     = document.getElementById('or_copy_btn');

                    function showMessage(text, type) {
                        if (!msgBox) return;
                        msgBox.textContent = text;
                        msgBox.style.color = (type === 'error') ? '#b91c1c' : '#047857';
                    }

                    function updateCampaignName() {
                        if (!campName) return;
                        var source  = srcMod && srcMod.value ? srcMod.value.trim() : '';
                        var medium  = medMod && medMod.value ? medMod.value.trim() : '';
                        var country = countryMod && countryMod.value ? countryMod.value.trim() : '';
                        var lang    = langMod && langMod.value ? langMod.value.trim() : '';
                        var theme   = themeMod && themeMod.value ? themeMod.value.trim() : '';

                        var name = 'oneroyal';
                        if (source)  name += '-' + source;
                        if (medium)  name += '-' + medium;
                        if (country) name += '-' + country;
                        if (lang)    name += '-' + lang;
                        if (theme)   name += '-' + theme;

                        campName.value = name;
                    }

                    function updateUTMMedium() {
                        if (!utmMedium || !medMod) return;
                        utmMedium.value = medMod.value || '';
                    }

                    function generateCampaignID() {
                        var campaignId = 'CID-' + Date.now().toString(36).toUpperCase();
                        var adsetId    = 'AID-' + Math.random().toString(36).substr(2, 10).toUpperCase();
                        if (utmSource) {
                            utmSource.value = campaignId + ',' + adsetId;
                        }
                        showMessage('Campaign ID and AdSet ID generated.', 'success');
                    }

                    function buildURL() {
                        if (!website || !campName || !utmMedium) {
                            showMessage('Please fill in Website, Campaign Name and UTM Medium.', 'error');
                            return;
                        }

                        var base = website.value.trim();
                        var camp = campName.value.trim();
                        var src  = utmSource ? utmSource.value.trim() : '';
                        var med  = utmMedium.value.trim();
                        var term = utmTerm ? utmTerm.value.trim() : '';
                        var cont = utmContent ? utmContent.value.trim() : '';

                        if (!base || !camp || !med) {
                            showMessage('Please fill in Website, Campaign Name and UTM Medium.', 'error');
                            return;
                        }

                        var url;
                        try {
                            url = new URL(base);
                        } catch (e) {
                            showMessage('Website URL is not valid. Please enter a full URL (e.g. https://www.oneroyal.com/en/).', 'error');
                            return;
                        }

                        url.searchParams.set('utm_campaign', camp);
                        if (src) {
                            url.searchParams.set('utm_source', src);
                        }
                        url.searchParams.set('utm_medium', med);
                        if (term) url.searchParams.set('utm_term', term);
                        if (cont) url.searchParams.set('utm_content', cont);

                        if (utmResult) {
                            utmResult.value = url.toString();
                        }
                        showMessage('OneRoyal URL generated successfully.', 'success');

                        if (utmResult && utmResult.scrollIntoView) {
                            utmResult.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }

                    function copyToClipboard() {
                        if (!utmResult || !utmResult.value) {
                            showMessage('There is no URL to copy.', 'error');
                            return;
                        }
                        var text = utmResult.value;
                        if (navigator.clipboard && navigator.clipboard.writeText) {
                            navigator.clipboard.writeText(text).then(function(){
                                showMessage('URL copied to clipboard!', 'success');
                            }).catch(function(){
                                fallbackCopy(text);
                            });
                        } else {
                            fallbackCopy(text);
                        }
                    }

                    function fallbackCopy(text) {
                        var temp = document.createElement('textarea');
                        temp.style.position = 'fixed';
                        temp.style.opacity = '0';
                        temp.value = text;
                        document.body.appendChild(temp);
                        temp.select();
                        try {
                            document.execCommand('copy');
                            showMessage('URL copied to clipboard!', 'success');
                        } catch (e) {
                            showMessage('Failed to copy URL, please copy manually.', 'error');
                        }
                        document.body.removeChild(temp);
                    }

                    if (srcMod)      srcMod.addEventListener('change', updateCampaignName);
                    if (medMod)      medMod.addEventListener('change', function(){ updateCampaignName(); updateUTMMedium(); });
                    if (countryMod)  countryMod.addEventListener('change', updateCampaignName);
                    if (langMod)     langMod.addEventListener('change', updateCampaignName);
                    if (themeMod)    themeMod.addEventListener('change', updateCampaignName);

                    if (generateBtn) generateBtn.addEventListener('click', function(e){ e.preventDefault(); generateCampaignID(); });
                    if (buildBtn)    buildBtn.addEventListener('click', function(e){ e.preventDefault(); buildURL(); });
                    if (copyBtn)     copyBtn.addEventListener('click', function(e){ e.preventDefault(); copyToClipboard(); });

                    updateCampaignName();
                    updateUTMMedium();
                });
            })();
            </script>
        </div>
        <?php
    }

}

new OneRoyal_UTM_Builder();