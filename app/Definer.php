<?php

namespace App;

class Definer
{
    /**
     * @return array
     */
    public static function arrCountry()
    {
        return self::country();
    }

    public static function getSuperAdminId()
    {
        return self::SuperAdminId();
    }

    /**
     * @return int
     */
    private static function SuperAdminId()
    {
        return 1;
    }

    /**
     * @return array
     */
    private static function country()
    {
        $country = [];
        $country['AL'] = '阿尔巴尼亚 (Shqipëria)';
        $country['DZ'] = '阿尔及利亚 (الجمهورية الجزائرية)';
        $country['AF'] = '阿富汗 (افغانستان)';
        $country['AR'] = '阿根廷 (Argentina)';
        $country['AE'] = '阿拉伯联合酋长国 (الإمارات العربيّة المتّحد)';
        $country['AW'] = '阿鲁巴 (Aruba)';
        $country['OM'] = '阿曼 (عمان)';
        $country['AZ'] = '阿塞拜疆 (Azərbaycan)';
        $country['EG'] = '埃及 (مصر)';
        $country['ET'] = "埃塞俄比亚 (Ityop'iya)";
        $country['IE'] = '爱尔兰 (Ireland)';
        $country['EE'] = '爱沙尼亚 (Eesti)';
        $country['AD'] = '安道尔 (Andorra)';
        $country['AO'] = '安哥拉 (Angola)';
        $country['AI'] = '安圭拉 (Anguilla)';
        $country['AG'] = '安提瓜和巴布达 (Antigua and Barbuda)';
        $country['AT'] = '奥地利 (Österreich)';
        $country['AU'] = '澳大利亚 (Australia)';
        $country['BB'] = '巴巴多斯 (Barbados)';
        $country['PG'] = '巴布亚新几内亚 (Papua New Guinea)';
        $country['BS'] = '巴哈马 (Bahamas)';
        $country['PK'] = '巴基斯坦 (پاکستان)';
        $country['PY'] = '巴拉圭 (Paraguay)';
        $country['PS'] = '巴勒斯坦 (Palestine)';
        $country['BH'] = '巴林 (بحرين)';
        $country['PA'] = '巴拿马 (Panamá)';
        $country['BR'] = '巴西 (Brasil)';
        $country['BY'] = '白俄罗斯 (Белару́сь)';
        $country['BM'] = '百慕大 (Bermuda)';
        $country['BG'] = '保加利亚 (България)';
        $country['MP'] = '北马里亚纳群岛 (Northern Mariana Islands)';
        $country['BJ'] = '贝宁 (Bénin)';
        $country['BE'] = '比利时 (België)';
        $country['IS'] = '冰岛 (Ísland)';
        $country['BO'] = '玻利维亚 (Bolivia)';
        $country['PR'] = '波多黎各 (Puerto Rico)';
        $country['PL'] = '波兰 (Polska)';
        $country['BA'] = '波斯尼亚和黑塞哥维那 (Bosna i Hercegovina)';
        $country['BW'] = '博茨瓦纳 (Botswana)';
        $country['BZ'] = '伯利兹 (Belize)';
        $country['BT'] = '不丹 (འབྲུག་ཡུལ)';
        $country['BF'] = '布基纳法索 (Burkina Faso)';
        $country['BI'] = '布隆迪 (Uburundi)';
        $country['BV'] = '布韦岛 (Bouvet Island)';
        $country['KP'] = '朝鲜 (조선)';
        $country['GQ'] = '赤道几内亚 (Guinea Ecuatorial)';
        $country['DK'] = '丹麦 (Danmark)';
        $country['DE'] = '德国 (Deutschland)';
        $country['TL'] = '东帝汶 (Timor-Leste)';
        $country['TG'] = '多哥 (Togo)';
        $country['DO'] = '多米尼加共和国 (Dominican Republic)';
        $country['DM'] = '多米尼克 (Dominica)';
        $country['RU'] = '俄罗斯 (Россия)';
        $country['EC'] = '厄瓜多尔 (Ecuador)';
        $country['ER'] = '厄立特里亚 (Ertra)';
        $country['FR'] = '法国 (France)';
        $country['FO'] = '法罗群岛 (Faroe Islands)';
        $country['PF'] = '法属波利尼西亚 (French Polynesia)';
        $country['GF'] = '法属圭亚那 (French Guiana)';
        $country['TF'] = '法属南部领地 (French Southern Territories)';
        $country['PH'] = '菲律宾 (Pilipinas)';
        $country['FI'] = '芬兰 (Suomi)';
        $country['CV'] = '佛得角 (Cabo Verde)';
        $country['AX'] = '福克兰群岛 (Åland Islands)';
        $country['FK'] = '福克兰群岛 (Falkland Islands)';
        $country['GM'] = '冈比亚 (Gambia)';
        $country['CG'] = '刚果 (Congo)';
        $country['CD'] = '刚果民主共和国 (Congo, Democratic Republic of the)';
        $country['CO'] = '哥伦比亚 (Colombia)';
        $country['CR'] = '哥斯达黎加 (Costa Rica)';
        $country['GG'] = '格恩西岛 (Guernsey)';
        $country['GD'] = '格林纳达 (Grenada)';
        $country['GL'] = '格陵兰 (Greenland)';
        $country['GE'] = '格鲁吉亚 (საქართველო)';
        $country['CU'] = '古巴 (Cuba)';
        $country['GP'] = '瓜德罗普 (Guadeloupe)';
        $country['GU'] = '关岛 (Guam)';
        $country['GY'] = '圭亚那 (Guyana)';
        $country['KZ'] = '哈萨克斯坦 (Қазақстан)';
        $country['HT'] = '海地 (Haïti)';
        $country['KR'] = '韩国 (한국)';
        $country['NL'] = '荷兰 (Nederland)';
        $country['AN'] = '荷属安的列斯 (Netherlands Antilles)';
        $country['HM'] = '赫德和麦克唐纳群岛 (Heard Island and McDonald Islands)';
        $country['HN'] = '洪都拉斯 (Honduras)';
        $country['KI'] = '基里巴斯 (Kiribati)';
        $country['DJ'] = '吉布提 (Djibouti)';
        $country['KG'] = '吉尔吉斯斯坦 (Кыргызстан)';
        $country['GN'] = '几内亚 (Guinée)';
        $country['GW'] = '几内亚比绍 (Guiné-Bissau)';
        $country['CA'] = '加拿大 (Canada)';
        $country['GH'] = '加纳 (Ghana)';
        $country['GA'] = '加蓬 (Gabon)';
        $country['KH'] = '柬埔寨 (Kampuchea)';
        $country['CZ'] = '捷克共和国 (Česko)';
        $country['ZW'] = '津巴布韦 (Zimbabwe)';
        $country['CM'] = '喀麦隆 (Cameroun)';
        $country['QA'] = '卡塔尔 (قطر)';
        $country['KY'] = '开曼群岛 (Cayman Islands)';
        $country['CC'] = '科科斯群岛 (Cocos Islands)';
        $country['KM'] = '科摩罗 (Comores)';
        $country['CI'] = "科特迪瓦 (Côte d'Ivoire)";
        $country['KW'] = '科威特 (الكويت)';
        $country['HR'] = '克罗地亚 (Hrvatska)';
        $country['KE'] = '肯尼亚 (Kenya)';
        $country['CK'] = '库克群岛 (Cook Islands)';
        $country['LV'] = '拉脱维亚 (Latvija)';
        $country['LS'] = '莱索托 (Lesotho)';
        $country['LA'] = '老挝 (ນລາວ)';
        $country['LB'] = '黎巴嫩 (لبنان)';
        $country['LR'] = '利比里亚 (Liberia)';
        $country['LY'] = '利比亚 (ليبية)';
        $country['LT'] = '立陶宛 (Lietuva)';
        $country['LI'] = '列支敦士登 (Liechtenstein)';
        $country['RE'] = '留尼汪岛 (Reunion)';
        $country['LU'] = '卢森堡 (Lëtzebuerg)';
        $country['RW'] = '卢旺达 (Rwanda)';
        $country['RO'] = '罗马尼亚 (România)';
        $country['MG'] = '马达加斯加 (Madagasikara)';
        $country['MT'] = '马耳他 (Malta)';
        $country['MV'] = '马尔代夫 (ގުޖޭއްރާ ޔާއްރިހޫމްޖ)';
        $country['MW'] = '马拉维 (Malawi)';
        $country['MY'] = '马来西亚 (Malaysia)';
        $country['ML'] = '马里 (Mali)';
        $country['MK'] = '马其顿 (Македонија)';
        $country['MH'] = '马绍尔群岛 (Marshall Islands)';
        $country['MQ'] = '马提尼克 (Martinique)';
        $country['YT'] = '马约特岛 (Mayotte)';
        $country['MU'] = '毛里求斯 (Mauritius)';
        $country['MR'] = '毛里塔尼亚 (موريتانية)';
        $country['US'] = '美国 (United States)';
        $country['AS'] = '美属萨摩亚 (American Samoa)';
        $country['UM'] = '美属外岛 (United States minor outlying islands)';
        $country['MN'] = '蒙古 (Монгол Улс)';
        $country['MS'] = '蒙特塞拉特 (Montserrat)';
        $country['BD'] = '孟加拉 (বাংলাদেশ)';
        $country['PE'] = '秘鲁 (Perú)';
        $country['FM'] = '密克罗尼西亚 (Micronesia)';
        $country['MM'] = '缅甸 (Լեռնային Ղարաբաղ)';
        $country['MD'] = '摩尔多瓦 (Moldova)';
        $country['MA'] = '摩洛哥 (مغرب)';
        $country['MC'] = '摩纳哥 (Monaco)';
        $country['MZ'] = '莫桑比克 (Moçambique)';
        $country['MX'] = '墨西哥 (México)';
        $country['NA'] = '纳米比亚 (Namibia)';
        $country['ZA'] = '南非 (South Africa)';
        $country['AQ'] = '南极洲 (Antarctica)';
        $country['GS'] = '南乔治亚和南桑德威奇群岛 (South Georgia and the South Sandwich Islands)';
        $country['NP'] = '尼泊尔 (नेपाल)';
        $country['NI'] = '尼加拉瓜 (Nicaragua)';
        $country['NE'] = '尼日尔 (Niger)';
        $country['NG'] = '尼日利亚 (Nigeria)';
        $country['NU'] = '纽埃 (Niue)';
        $country['NO'] = '挪威 (Norge)';
        $country['NF'] = '诺福克岛 (Norfolk Island)';
        $country['PW'] = '帕劳 (Belau)';
        $country['PN'] = '皮特凯恩 (Pitcairn)';
        $country['PT'] = '葡萄牙 (Portugal)';
        $country['JP'] = '日本';
        $country['SE'] = '瑞典 (Sverige)';
        $country['CH'] = '瑞士 (Schweiz)';
        $country['SV'] = '萨尔瓦多 (El Salvador)';
        $country['WS'] = '萨摩亚 (Samoa)';
        $country['CS'] = '塞尔维亚及蒙蒂纳哥 (Србија и Црна Гора)';
        $country['SL'] = '塞拉利昂 (Sierra Leone)';
        $country['SN'] = '塞内加尔 (Sénégal)';
        $country['CY'] = '塞浦路斯 (Κυπρος)';
        $country['SC'] = '塞舌尔 (Seychelles)';
        $country['SA'] = '沙特阿拉伯 (العربية السعودية)';
        $country['CX'] = '圣诞岛 (Christmas Island)';
        $country['ST'] = '圣多美和普林西比 (São Tomé and Príncipe)';
        $country['SH'] = '圣赫勒拿 (Saint Helena)';
        $country['KN'] = '圣基茨和尼维斯 (Saint Kitts and Nevis)';
        $country['LC'] = '圣卢西亚 (Saint Lucia)';
        $country['SM'] = '圣马力诺 (San Marino)';
        $country['PM'] = '圣皮埃尔和密克隆群岛 (Saint Pierre and Miquelon)';
        $country['VC'] = '圣文森特和格林纳丁斯 (Saint Vincent and the Grenadines)';
        $country['LK'] = '斯里兰卡 (Sri Lanka)';
        $country['SK'] = '斯洛伐克 (Slovensko)';
        $country['SI'] = '斯洛文尼亚 (Slovenija)';
        $country['SJ'] = '斯瓦尔巴和扬马延 (Svalbard and Jan Mayen)';
        $country['SZ'] = '斯威士兰 (Swaziland)';
        $country['SD'] = '苏丹 (السودان)';
        $country['SR'] = '苏里南 (Suriname)';
        $country['SO'] = '索马里 (Soomaaliya)';
        $country['SB'] = '所罗门群岛 (Solomon Islands)';
        $country['TJ'] = '塔吉克斯坦 (Тоҷикистон)';
        $country['TH'] = '泰国 (ราชอาณาจักรไทย)';
        $country['TZ'] = '坦桑尼亚 (Tanzania)';
        $country['TO'] = '汤加 (Tonga)';
        $country['TC'] = '特克斯和凯科斯群岛 (Turks and Caicos Islands)';
        $country['TT'] = '特立尼达和多巴哥 (Trinidad and Tobago)';
        $country['TN'] = '突尼斯 (تونس)';
        $country['TV'] = '图瓦卢 (Tuvalu)';
        $country['TR'] = '土耳其 (Türkiye)';
        $country['TM'] = '土库曼斯坦 (Türkmenistan)';
        $country['TK'] = '托克劳 (Tokelau)';
        $country['WF'] = '瓦利斯和福图纳 (Wallis and Futuna)';
        $country['VU'] = '瓦努阿图 (Vanuatu)';
        $country['GT'] = '危地马拉 (Guatemala)';
        $country['VI'] = '维尔京群岛，美属 (Virgin Islands, U.S.)';
        $country['VG'] = '维尔京群岛，英属 (Virgin Islands, British)';
        $country['VE'] = '委内瑞拉 (Venezuela)';
        $country['BN'] = '文莱 (Brunei Darussalam)';
        $country['UG'] = '乌干达 (Uganda)';
        $country['UA'] = '乌克兰 (Україна)';
        $country['UY'] = '乌拉圭 (Uruguay)';
        $country['UZ'] = "乌兹别克斯坦 (O'zbekiston)";
        $country['ES'] = '西班牙 (España)';
        $country['EH'] = '西撒哈拉 (صحراوية)';
        $country['GR'] = "希腊 ('Eλλας)";
        $country['SG'] = '新加坡 (Singapura)';
        $country['NC'] = '新喀里多尼亚 (New Caledonia)';
        $country['NZ'] = '新西兰 (New Zealand)';
        $country['HU'] = '匈牙利 (Magyarország)';
        $country['SY'] = '叙利亚 (سورية)';
        $country['JM'] = '牙买加 (Jamaica)';
        $country['AM'] = '亚美尼亚 (Հայաստան)';
        $country['YE'] = '也门 (اليمن)';
        $country['IQ'] = '伊拉克 (العراق)';
        $country['IR'] = '伊朗 (ایران)';
        $country['IL'] = '以色列 (ישראל)';
        $country['IT'] = '意大利 (Italia)';
        $country['IN'] = '印度 (India)';
        $country['ID'] = '印度尼西亚 (Indonesia)';
        $country['GB'] = '英国 (United Kingdom)';
        $country['IO'] = '英属印度洋领地 (British Indian Ocean Territory)';
        $country['JO'] = '约旦 (الارد)';
        $country['VN'] = '越南 (Việt Nam)';
        $country['ZM'] = '赞比亚 (Zambia)';
        $country['JE'] = '泽西岛 (Jersey)';
        $country['TD'] = '乍得 (Tchad)';
        $country['GI'] = '直布罗陀 (Gibraltar)';
        $country['CL'] = '智利 (Chile)';
        $country['CF'] = '中非共和国 (République Centrafricaine)';
        $country['CN'] = '中国';
        $country['NR'] = '瑙鲁 (Naoero)';
        $country['VA'] = '梵蒂冈 (Città del Vaticano)';
        $country['FJ'] = '斐济 (Fiji)';

        return $country;
    }
}
