/**
 * Created by Minh on 5/25/2017.
 */
var citynames = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: {
        url: 'assets/citynames.json',
        filter: function(list) {
            return $.map(list, function(cityname) {
                return { name: cityname }; });
        }
    }
});
citynames.initialize();

$('input').tagsinput({
    typeaheadjs: {
        name: 'citynames',
        displayKey: 'name',
        valueKey: 'name',
        source: citynames.ttAdapter()
    }
});