function populateSecondKin(s1, s2) {
  var s1 = document.getElementById(s1);
  var s2 = document.getElementById(s2);
  s2.innerHTML = "";
  if (s1.value == "ARUSHA") {
    var optionArray = [
      "|Select District",
      "MERU|MERU",
      "ARUSHA URBAN|ARUSHA URBAN",
      "ARUSHA RURAL|ARUSHA RURAL",
      "KARATU|KARATU",
      "LONGIDO|LONGIDO",
      "MONDULI|MONDULI",
      "NGORONGORO|NGORONGORO"
    ];
  } else if (s1.value == "DAR ES SALAAM") {
    var optionArray = [
      "|Select District",
      "ILALA|ILALA",
      "KINONDONI|KINONDONI",
      "TEMEKE|TEMEKE",
      "KIGAMBONI|KIGAMBONI",
      "UBUNGO|UBUNGO"
    ];
  } else if (s1.value == "DODOMA") {
    var optionArray = [
      "|Select District",
      "BAHI|BAHI",
      "CHAMWINO|CHAMWINO",
      "CHEMBA|CHEMBA",
      "DODOMA|DODOMA",
      "KONDOA|KONDOA",
      "KONGWA|KONGWA",
      "MPWAMPWA|MPWAMPWA"
    ];
  } else if (s1.value == "GEITA") {
    var optionArray = [
      "|Select District",
      "BUKOMBE|BUKOMBE",
      "CHATO|CHATO",
      "GEITA URBAN|GEITA URBAN",
      "GEITA RURAL|GEITA RURAL",
      "MBONGWE|MBONGWE",
      "NYANG`HWALE|NYANG`HWALE"
    ];
  } else if (s1.value == "KAGERA") {
    var optionArray = [
      "|Select District",
      "BIHARAMULO|BIHARAMULO",
      "BUKOBA URBAN|BUKOBA URBAN",
      "BUKOBA RURAL|BUKOBA RURAL",
      "KARAGWE|KARAGWE",
      "KYERWA|KYERWA",
      "MISENYI|MISENYI",
      "MULEBA|MULEBA",
      "NGARA|NGARA"
    ];
  } else if (s1.value == "KATAVI") {
    var optionArray = [
      "|Select District",
      "MLELE|MLELE",
      "MPANDA URBAN|MPANDA URBAN",
      "MPANDA RURAL|MPANDA RURAL"
    ];
  } else if (s1.value == "KIGOMA") {
    var optionArray = [
      "|Select District",
      "BUHINGWE|BUHINGWE",
      "KAKONKO|KAKONKO",
      "KASULU URBAN|KASULU URBAN",
      "KASULU RURAL|KASULU RURAL",
      "KIGOMA|KIGOMA",
      "KIGOMA-UJIJI|KIGOMA-UJIJI",
      "UVINZA|UVINZA"
    ];
  } else if (s1.value == "KILIMANJARO") {
    var optionArray = [
      "|Select District",
      "HAI|HAI",
      "MOSHI URBAN|MOSHI URBAN",
      "MOSHI RURAL|MOSHI RURAL",
      "MWANGA|MWANGA",
      "ROMBO|ROMBO",
      "SAME|SAME",
      "SIHA|SIHA"
    ];
  } else if (s1.value == "LINDI") {
    var optionArray = [
      "|Select District",
      "KILWA|KILWA",
      "LINDI URBAN|LINDI URBAN",
      "LINDI RURAL|LINDI RURAL",
      "LIWALE|LIWALE",
      "NACHINGWEA|NACHINGWEA",
      "RUANGWA|RUANGWA"
    ];
  } else if (s1.value == "MANYARA") {
    var optionArray = [
      "|Select District",
      "BABATI URBAN|BABATI URBAN",
      "BABATI RURAL|BABATI RURAL",
      "HANANG|HANANG",
      "KITETO|KITETO",
      "MBULU|MBULU",
      "SIMANJIRO|SIMANJIRO"
    ];
  } else if (s1.value == "MBEYA") {
    var optionArray = [
      "|Select District",
      "BUSEKO|BUSEKO",
      "CHUNYA|CHUNYA",
      "KYELA|KYELA",
      "MBARALI|MBARALI",
      "MBEYA URBAN|MBEYA URBAN",
      "MBEYA RURAL|MBEYA RURAL",
      "RUNGWE|RUNGWE"
    ];
  } else if (s1.value == "MOROGORO") {
    var optionArray = [
      "|Select District",
      "GAIRO|GAIRO",
      "KILOMBERO|KILOMBERO",
      "MOROGORO URBAN|MOROGORO URBAN",
      "MOROGORO RURAL|MOROGORO RURAL",
      "MVOMERO|MVOMERO",
      "MALINYI|MALINYI",
      "ULANGA|ULANGA",
      "IFAKARA|IFAKARA"
    ];
  } else if (s1.value == "MTWARA") {
    var optionArray = [
      "|Select District",
      "MASASI URBAN|MASASI URBAN",
      "MASASI RURAL|MASASI RURAL",
      "MTWARA URBAN|MTWARA URBAN",
      "MTWARA RURAL|MTWARA RURAL",
      "NANYUMBU|NANYUMBU",
      "NEWALA|NEWALA",
      "TANDAHIMBA|TANDAHIMBA"
    ];
  } else if (s1.value == "MWANZA") {
    var optionArray = [
      "|Select District",
      "ILEMELA|ILEMELA",
      "KWIMBA|KWIMBA",
      "MAGU|MAGU",
      "MISUNGWI|MISUNGWI",
      "NYAMAGANA|NYAMAGANA",
      "SENGEREMA|SENGEREMA",
      "UKEREWE|UKEREWE"
    ];
  } else if (s1.value == "NJOMBE") {
    var optionArray = [
      "|Select District",
      "LUDEWA|LUDEWA",
      "MAKAMBAKO|MAKAMBAKO",
      "MAKETE|MAKETE",
      "NJOMBE URBAN|NJOMBE URBAN",
      "NJOMBE RURAL|NJOMBE RURAL",
      "WANGING`OMBE|WANGING`OMBE"
    ];
  } else if (s1.value == "PEMBA KASKAZINI") {
    var optionArray = [
      "|Select District",
      "CHAKE CHAKE|CHAKE CHAKE",
      "MKOANI|MKOANI"
    ];
  } else if (s1.value == "PEMBA KUSINI") {
    var optionArray = [
      "|Select District",
      "MICHEWENI|MICHEWENI",
      "WETE|WETE"
    ];
  } else if (s1.value == "PWANI") {
    var optionArray = [
      "|Select District",
      "BAGAMOYO|BAGAMOYO",
      "KIBAHA URBAN|KIBAHA URBAN",
      "KIBAHA RURAL|KIBAHA RURAL",
      "MISUNGWI|MISUNGWI",
      "KISARAWE|KISARAWE",
      "MAFIA|MAFIA",
      "MKURANGA|MKURANGA",
      "RUFIJI|RUFIJI"
    ];
  } else if (s1.value == "RUKWA") {
    var optionArray = [
      "|Select District",
      "KALAMBO|KALAMBO",
      "NKASI|NKASI",
      "SUMBAWANGA URBAN|SUMBAWANGA URBAN",
      "SUMBAWANGA RURAL|SUMBAWANGA RURAL"
    ];
  } else if (s1.value == "RUVUMA") {
    var optionArray = [
      "|Select District",
      "MBINGA|MBINGA",
      "SONGEA URBAN|SONGEA URBAN",
      "SONGEA RURAL|SONGEA RURAL",
      "TUNDURU|TUNDURU",
      "NAMTUMBO|NAMTUMBO",
      "NYASA|NYASA"
    ];
  } else if (s1.value == "SHINYANGA") {
    var optionArray = [
      "|Select District",
      "KAHAMA URBAN|KAHAMA URBAN",
      "KAHAMA RURAL|KAHAMA RURAL",
      "KISHAPU|KISHAPU",
      "SHINYANGA URBAN|SHINYANGA URBAN",
      "SHINYANGA RURAL|SHINYANGA RURAL"
    ];
  } else if (s1.value == "SIMIYU") {
    var optionArray = [
      "|Select District",
      "BARIADI|BARIADI",
      "BUSEGA|BUSEGA",
      "ITILIMA|ITILIMA",
      "MASWA|MASWA",
      "MEATU|MEATU"
    ];
  } else if (s1.value == "SINGIDA") {
    var optionArray = [
      "|Select District",
      "IKUNGI|IKUNGI",
      "IRAMBA|IRAMBA",
      "MANYONI|MANYONI",
      "MAKALAMA|MAKALAMA",
      "SINGIDA URBAN|SINGIDA URBAN",
      "SINGIDA RURAL|SINGIDA RURAL"
    ];
  } else if (s1.value == "SONGWE") {
    var optionArray = [
      "|Select District",
      "ILEJE|ILEJE",
      "MBOZI|MBOZI",
      "MOMBA|MOMBA",
      "SONGWE|SONGWE"
    ];
  } else if (s1.value == "TABORA") {
    var optionArray = [
      "|Select District",
      "IGUNGA|IGUNGA",
      "KALIUA|KALIUA",
      "NZEGA|NZEGA",
      "SIKONGE|SIKONGE",
      "TABORA|TABORA",
      "URAMBO|URAMBO",
      "UYUI|UYUI"
    ];
  } else if (s1.value == "TANGA") {
    var optionArray = [
      "|Select District",
      "HANDENI URBAN|HANDENI URBAN",
      "HANDENI RURAL|HANDENI RURAL",
      "KILINDI|KILINDI",
      "KOROGWE URBAN|KOROGWE URBAN",
      "KOROGWE RURAL|KOROGWE RURAL",
      "LUSHOTO|LUSHOTO",
      "MUHEZA|MUHEZA",
      "MKINGA|MKINGA",
      "PANGANI|PANGANI",
      "TANGA URBAN|TANGA URBAN"
    ];
  } else if (s1.value == "UGUNJA MJINI") {
    var optionArray = [
      "|Select District",
      "MAGHARIBI|MAGHARIBI",
      "MJINI|MJINI"
    ];
  } else if (s1.value == "UNGUJA KUSINI") {
    var optionArray = [
      "|Select District",
      "KATI|KATI",
      "KUSINNI|KUSINNI"
    ];
  } else if (s1.value == "UNGUJA KASKAZINI") {
    var optionArray = [
      "|Select District",
      "KASKAZINI A|KASKAZINI A",
      "KASKAZINI B|KASKAZINI B"
    ];
  }
  for (var option in optionArray) {
    var pair = optionArray[option].split("|");
    var newOption = document.createElement("option");
    newOption.value = pair[0];
    newOption.innerHTML = pair[1];
    s2.options.add(newOption);
  }
}