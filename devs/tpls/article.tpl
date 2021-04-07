[[ skeleton homeBase ]]

    [[ block CONTENT ]]
        <p>
            <div>
                <strong>{? =titre ?}</strong>
            </div>
            <div>
                par <a href="{? =host ?}auteur/{? =authorid ?}">{? =author ?}</a>
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
