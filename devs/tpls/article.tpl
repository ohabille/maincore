[[ skeleton homeBase ]]

    [[ block CONTENT ]]
        <p>
            <div>
                <strong>{? =titre ?}</strong> <em><a href="{? =host ?}categorie/{? =categorieid ?}">{? =categorie ?}</a></em>
            </div>
            <div>
                par <a href="{? =host ?}member/{? =memberid ?}">{? =member ?}</a>
                , le {? =weekday ?} {? =mday ?} {? =month ?} {? =year ?}
            </div>
            <div>
                {? =accroche ?}
            </div>
            <div>
                {? =texte ?}
            </div>
        </p>
    [[ endblock ]]
